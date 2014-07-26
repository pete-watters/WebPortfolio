#!/bin/bash

# ==========================================================
# ==========================================================
# Company: THE NOW FACTORY
# Website: http://www.thenowfactory.com/
#
# Author: Agustin Fernandez
# Creation date: 26/Feb/2009
#
# DESCRIPTION:
# This script checks vital services in probe:
#
# INPUT:
#   No input expected
#
# OUPUT:
#   To standart ouput only. It is not stored anymore into a file.
#
# CRONTAB:
#  No requiered on crontab
#
#
# ==========================================================
# =============  C H A N G E S    L O G  ===================
# ==========================================================
#  Date         Author             Ver  Description
# ==========================================================
#
#  26/Feb/2009  Agustin Fernandez  1.0  Kick off
#  28/Jun/2011  Agustin Fernandez  2.0  Added check for multi TNF cards
#  05/Aug/2011  Agustin Fernandez  2.1  Added DCV NIC statistics
#  12/Aug/2011  Agustin Fernandez  2.2  Added sFTP stats and df overflow.
#  15/Aug/2011  Agustin Fernandez  2.3  Added NAPATECH modules checks.
#  30/Aug/2011  Agustin Fernandez  2.4  Added Swap and Linux RAID checks.
#  31/Aug/2011  Agustin Fernandez  2.5  fixed small bug when yesterday' statistics file is missing.
#  07/Sep/2011  Agustin Fernandez  2.6  Modified Napatech driver's output.
#
# ==========================================================
VERSION="2.6   This script checks vital services in probes"


# =========================================== Timestamps ===
NOW="`/bin/date +'%Y.%m.%d_%H.%M.%S'`"
YESTERDAY="`/bin/date -dyesterday +'%Y.%m.%d'`"
# ==========================================================



# ==========================================================
# === U S E R  S E T T I N S ===============================
# ==========================================================
TDRs_No_Compressed="midas*.log"
TDRs_Compressed="midas*.log.gz"
Files_Compressed="*.log.gz"
Files_No_Compressed="*.log"



# ==========================================================
# === Functions     ========================================
# ==========================================================

function Separator
{
echo
echo "========================================================"
echo
}



function get_YESTERDAY_NIC_rates {

   YESTERDAY_NIC_FILE=""
   YESTERDAY_NIC_FILE1="/apps/midas/scripts/output/DCV/NIC-stats/NIC-stats.${YESTERDAY}.csv"
   YESTERDAY_NIC_FILE2="/apps/midas/scripts/output/NIC-stats/NIC-stats.${YESTERDAY}.csv"

   if   [ -s ${YESTERDAY_NIC_FILE1} ]; then
      YESTERDAY_NIC_FILE="${YESTERDAY_NIC_FILE1}"
   elif [ -s ${YESTERDAY_NIC_FILE2} ]; then
      YESTERDAY_NIC_FILE="${YESTERDAY_NIC_FILE2}"
   fi

   if [ ${YESTERDAY_NIC_FILE} ] && [ -s ${YESTERDAY_NIC_FILE} ]; then
      /usr/bin/awk -F',' 'BEGIN {MaxRate=0; MinRate=99999} (NR > 1 && $3 > MaxRate) {MaxDate=$1; MaxTime=$2; MaxRate=$3}; (NR > 1 && $3 && $3 < MinRate) {MinDate=$1; MinTime=$2; MinRate=$3} END {printf "\n%8s Mbits was Maximun NIC rate reached yesterday %s at %s\n", MaxRate, MaxDate, MaxTime; printf "%8s Mbits was Minimum NIC rate reached yesterday %s at %s\n",MinRate, MinDate, MinTime}' ${YESTERDAY_NIC_FILE}
   fi

}



function CountTDRsInDirectory {

if [ -d ${1} ]; then

   [ "${1}" == "/apps/midas/bin/MANAGE/process/dacas/" ] && continue
   NUM_LOG_TDRs=`/usr/bin/find ${1} -name "${Files_No_Compressed}" | /usr/bin/wc -l`
   NUM_LOGGZ_TDRs=`/usr/bin/find ${1} -name "${Files_Compressed}"  | /usr/bin/wc -l`
   [ ${NUM_LOG_TDRs} -eq 0 ] && [ ${NUM_LOGGZ_TDRs} -eq 0 ] && continue
   printf "[log: %5s]   [log.gz: %5s]  on: %s\n" ${NUM_LOG_TDRs} ${NUM_LOGGZ_TDRs} ${1}
fi
}



function SearchStringsInDlauncherLogs {

   LogsStrings="$1"
   LogsDate="$2"
   LogsDir="/apps/midas/admin/"
   LogsFiles="dlauncher*.log"
   temp_dlauncher="/tmp/dlauncherLogsFiles.${NOW}.tmp"
   temp_StringsFound="/tmp/StringsFoundInLogs.${NOW}.tmp"

   [ "${LogsDate}" == "today" ] && mydate="`/bin/date +'%d/%m/%Y'`"
   [ "${LogsDate}" == "yesterday" ] && mydate="`/bin/date -dyesterday +'%d/%m/%Y'`"

   /usr/bin/find ${LogsDir} -name "${LogsFiles}" > "${temp_dlauncher}"

   if [ -s "${temp_dlauncher}" ]; then

      for myLogFile in `/bin/cat ${temp_dlauncher}`; do
         /bin/grep -e "^${mydate}" ${myLogFile} | /bin/egrep -i "${LogsStrings}" >> ${temp_StringsFound}
      done

      NUM_STRINGS_FOUND="`/usr/bin/wc -l ${temp_StringsFound} | /usr/bin/awk '{print $1}'`"
      printf "\n[%6s occurrences found for string(s) '%s' in %s dlauncher logs ]\n" ${NUM_STRINGS_FOUND} ${LogsStrings} ${LogsDate}
      /bin/cat ${temp_StringsFound} | /usr/bin/awk '{print $3}' | /usr/bin/sort | /usr/bin/uniq -c | /usr/bin/sort -nrk1
      /bin/rm -f ${temp_StringsFound}
   fi

   /bin/rm -f ${temp_dlauncher}
}



# ==========================================================
# === M A I N  P R O G R A M ===============================
# ==========================================================

# -------- CHECK RELEASE -----------
([ "$1" == "-v" ] || [ "$1" == "-V" ]) && echo "`/usr/bin/basename $0`  ${VERSION}" && exit 0



# ----------- KERNEL --------------
Separator
/bin/uname -a | /usr/bin/awk '($3 ~ "2.6.31") {print $2": Midas+ H2   <"$3">"}; ($3 ~ "2.6.22") {print $2": Midas+ H1   <"$3">"}'



# ------- LAST BOOT UP ------------
Separator
echo "### Any unexpected reboot on this probe? ###"; echo
/usr/bin/uptime



# ------- SYNCHRONIZATION ----------
Separator
echo; echo "### Are DATE, TIME and TIMEZONE correct on this probe? ###"
echo; echo "System date: `/bin/date +'%c'`"
echo "BIOS   date: `/sbin/hwclock`"



# ------- PARTITIONS ---------------------
Separator
/bin/df -h | /bin/egrep -e "^/dev/|ramdisk|tmpfs|Filesystem|overflow"



# ------- Internal disks' RAID  ----------
Separator
echo "### Are all 3 internal RAIDs active? ###" ; echo
/bin/cat /proc/mdstat | /bin/egrep -e '^md.' | /usr/bin/sort



# ------------  SWAPPING  -----------------
Separator
echo "### Is Swapping enabled? ###" ; echo
/usr/bin/free | /bin/egrep -e '^Swap:'



# ------- DISKS and RAID checks ----------
Separator

MEGACLI="/usr/sbin/MegaCli"

if [ -x ${MEGACLI} ]; then
   echo "### Is there any Virtualdisk on Degraded status? ###" ; echo
   ${MEGACLI} -LDInfo -Lall -aALL | /bin/grep -e '^State:' | /usr/bin/sort | /usr/bin/uniq -c | sort -nrk1
   echo
   echo "### Is there any external physical disk not on-line? ###" ; echo
   ${MEGACLI} -PDList -aAll | /bin/egrep -e '^Firmware state:' | /usr/bin/sort | /usr/bin/uniq -c | /usr/bin/sort -nrk1
else
   echo "RAID Controler ${MEGACLI} not found"
fi



# -------  NIC INTERFACES  ---------------
Separator

for myNIC in 0 1; do
   echo "### NIC eth${myNIC}  ###"; echo
   if [ -x /usr/sbin/ethtool ]; then
      /usr/sbin/ethtool eth${myNIC} | /bin/egrep "Auto-negotiation|Speed:|Duplex:|Link detected:"
   elif [ -x /sbin/mii-tool ]; then
      /sbin/mii-tool | /bin/grep eth${myNIC}
   fi
   /sbin/ifconfig eth${myNIC} | /bin/egrep "collisions|RX bytes"
   echo
done



# -------- FEEDs CARD    ----------------
Separator
echo "### FEEDs card  ###"; echo

/sbin/lsmod | /bin/egrep 'xyxs|ntki' | /usr/bin/awk '($1=="xyxs") {print "Loaded NAPATECH driver for:  1G cards"}; ($1=="ntki") {print "Loaded NAPATECH driver for: 10G cards"}'

for myCard in 0 1 2 3; do
   if [ -e /proc/driver/ipblaze/${myCard}/flash ]; then
      printf "\n###  TNF Card %d  ###\n\n" ${myCard}
      /bin/cat /proc/driver/ipblaze/${myCard}/flash
   fi
done



# ------- KERNEL SETTINGS --------------
Separator
echo "### Relevant kernel settings ###"; echo

MyListKernelSettings="kernel.shmmax kernel.panic kernel.panic_on_oops"

for myKernelSettings in ${MyListKernelSettings}; do
   echo "${myKernelSettings}: `/sbin/sysctl -n ${myKernelSettings}`"
done



# -------- NIC TRAFFIC  ------------------
Separator
echo "### Do we have FEEDs in this probe now? ###"; echo

NIC_LOG_FILE=""
NIC_LOG_FILE1="/apps/midas/scripts/output/DCV/NIC-stats/NIC-stats.csv"
NIC_LOG_FILE2="/apps/midas/scripts/output/NIC-stats/NIC-stats.csv"

if [ -s ${NIC_LOG_FILE1} ]; then
   NIC_LOG_FILE="${NIC_LOG_FILE1}"
elif [ -s ${NIC_LOG_FILE2} ]; then
   NIC_LOG_FILE="${NIC_LOG_FILE2}"
fi

if [ ${NIC_LOG_FILE} ] && [ -s ${NIC_LOG_FILE} ]; then
   /usr/bin/tail -10 ${NIC_LOG_FILE}
fi

get_YESTERDAY_NIC_rates



# ------- BINARIES RELEASES --------------
Separator
[ -x /apps/midas/bin/dlauncher ]  && echo -n "DLAUNCHER:  " && /apps/midas/bin/dlauncher -v
[ -x /apps/midas/bin/dacas ]      && echo -n "DACAS:      " && /apps/midas/bin/dacas -v
[ -x /apps/midas/bin/swriter ]    && echo -n "SWRITER:    " && /apps/midas/bin/swriter -v
[ -x /apps/midas/bin/localagent ] && echo -n "LOCALAGENT: " && /apps/midas/bin/localagent -v



# ------- PROCESS RUNNING --------------
Separator
echo "### Are dacas and dlauncher processes running? ###"; echo
/bin/ps -ef | /bin/egrep "dlauncher|dacastnf.sh|dacas|swriter|localagent" | /bin/egrep -v "lsof|find|gzip|grep|tar|rsync|cat|wc" | /usr/bin/awk '{print $8,$9,$10,$11}' | /usr/bin/sort



# ----- SHARED MEMORY SEGMENTS ----------
Separator
echo "### Is there any shared memory segment (nattch > 2)? ###"; echo
/usr/bin/ipcs -m | /bin/grep -e "^0x" | /usr/bin/awk '($6 > 2) {print $0}'



# ------- UNEXPECTED PROCESS DEAD ---------
Separator
echo "### Is there any unexpected died process into <dlauncher> logs? ###" ; echo

SearchStringsInDlauncherLogs "died" "yesterday"
SearchStringsInDlauncherLogs "died" "today"



# ------- TDRs FILES BEING PRODUCED -----------
Separator
echo "### Are being produced TDRs? ###"; echo
/usr/bin/lsof -c dacas 2> /dev/null | /bin/grep -e "log$" | /bin/egrep -v "stat_|trace_|dlauncher|sgsns" | /usr/bin/awk '{printf "Size:%10s  %s\n",$7,$9}' | /usr/bin/sort -k3



# ------- PCAPs FILES BEING PRODUCED -----------
Separator
echo "### Are being produced PCAPs? ###"; echo
/usr/bin/lsof -c swriter 2> /dev/null | /bin/grep -e "tmp$" | /bin/egrep -v "idx.tmp" | /usr/bin/awk '{printf "Size:%15s  %s\n",$7,$9}' | /usr/bin/sort -k3



# --------- Counting TDRs FILES -----------------
Separator
echo "### Are TDRs being compressed, downloaded and deleted? ###"; echo

DACAS_DIR="/apps/midas/bin/MANAGE/process/dacas/"
TEMP_FILE="/tmp/TDRsdirs.${NOW}.tmp"

/usr/bin/find ${DACAS_DIR} -nowarn -type d -maxdepth 1 | /bin/egrep -v "compressing|stats|trace|imgdump" > ${TEMP_FILE}

for mydir in `/bin/cat ${TEMP_FILE}`
do
   CountTDRsInDirectory ${mydir}
done
/bin/rm -f ${TEMP_FILE}



# ------- PROCESS MEM & CPU --------------
Separator
echo "### Is there any process taking so much memory, swap or CPU? ###"; echo
/usr/bin/top -b -n1 -u root | /usr/bin/head -25



# --------  FTP reports ------------------
   today=`/bin/date +'%a %b %e'`
   FTPlog="/var/log/vsftpd.log"
   FTPconf="/etc/vsftpd.conf"
   FTP_temp_file="/tmp/vsftp_log.txt"

   /bin/cat ${FTPlog} | /bin/grep -e "^${today}"  > ${FTP_temp_file}

    connects=`/bin/cat ${FTP_temp_file} | /bin/grep "CONNECT:"            | /usr/bin/wc -l`
      logins=`/bin/cat ${FTP_temp_file} | /bin/grep "OK LOGIN:"           | /usr/bin/wc -l`
  faillogins=`/bin/cat ${FTP_temp_file} | /bin/grep "FAIL LOGIN:"         | /usr/bin/wc -l`
   downloads=`/bin/cat ${FTP_temp_file} | /bin/grep "OK DOWNLOAD:"        | /usr/bin/wc -l`
failDownload=`/bin/cat ${FTP_temp_file} | /bin/grep "FAIL DOWNLOAD:"      | /usr/bin/wc -l`
      delete=`/bin/cat ${FTP_temp_file} | /bin/grep "OK DELETE:"          | /usr/bin/wc -l`
  failDelete=`/bin/cat ${FTP_temp_file} | /bin/grep "FAIL DELETE:"        | /usr/bin/wc -l`
     refused=`/bin/cat ${FTP_temp_file} | /bin/grep "Connection refused:" | /usr/bin/wc -l`

   Separator
   printf "### Today' statistics from ${FTPlog} file:\n\n"
   printf "[%6s connections      ]\n" ${connects}
   printf "[%6s logins           ]\n" ${logins}
   printf "[%6s failed logins    ]\n" ${faillogins}
   printf "[%6s downloads        ]\n" ${downloads}
   printf "[%6s failed downloads ]\n" ${failDownload}
   printf "[%6s deletes          ]\n" ${delete}
   printf "[%6s failed deletes   ]\n" ${failDelete}
   printf "[%6s refused          ]\n" ${refused}

   /bin/rm -f ${FTP_temp_file}

   echo; echo "### Are 'timeouts' set to 20 seconds in ${FTPconf}? ###"
   /bin/egrep "timeout|max" ${FTPconf}



# -------  sFTP reports  -----------------
   today=`/bin/date +'%b %e'`
   sFTPlog="/var/log/auth.log"
   sFTPconf="/etc/ssh/sshd_config"
   sFTPconf2222="/etc/ssh/sshd_config*2222"
   sFTP_temp_file="/tmp/sftp_log.txt"

   /bin/cat ${sFTPlog} | /bin/grep -e "^${today}" | /bin/egrep "sshd|scponly"  > ${sFTP_temp_file}

      opened=`/bin/cat ${sFTP_temp_file} | /bin/grep "session opened for user"    | /usr/bin/wc -l`
      closed=`/bin/cat ${sFTP_temp_file} | /bin/grep "session closed for user"    | /usr/bin/wc -l`
disconnected=`/bin/cat ${sFTP_temp_file} | /bin/grep "Received disconnect from"   | /usr/bin/wc -l`
     PubKeys=`/bin/cat ${sFTP_temp_file} | /bin/grep "Accepted publickey for"     | /usr/bin/wc -l`
      PassIn=`/bin/cat ${sFTP_temp_file} | /bin/grep "Accepted password"          | /usr/bin/wc -l`
    requests=`/bin/cat ${sFTP_temp_file} | /bin/egrep "subsystem request for sftp|running: /usr/bin/scp" | /usr/bin/wc -l`

   Separator
   printf "### Today' statistics from ${sFTPlog} file:\n\n"
   printf "[%6s ssh opened        ]\n" ${opened}
   printf "[%6s ssh closed        ]\n" ${closed}
   printf "[%6s ssh disconnected  ]\n" ${disconnected}
   printf "[%6s pubkeys accepted  ]\n" ${PubKeys}
   printf "[%6s password accepted ]\n" ${PassIn}
   printf "[%6s sftp up/downloads ]\n" ${requests}


   /bin/rm -f ${sFTP_temp_file}

   echo; echo "### Are 'ClientAlive' settings in place? ###"; echo
   /bin/egrep "ClientAlive" /etc/ssh/sshd_config*


# ----- CONNECTIONS ESTABLISHED ----------
Separator
NUM_SESSIONS="`/bin/netstat -an | /bin/grep 'ESTABLISHED' | /usr/bin/wc -l`"
printf "Current number of 'ESTABLISHED' connections: %5d\n" ${NUM_SESSIONS}



# ------- USER LIMITS --------------------
Separator

CORE_LIMITS=`ulimit -c`
if [ ${CORE_LIMITS} == "0" ]; then
   echo "Core's production is DISABLED. <${CORE_LIMITS}>"
elif  [ ${CORE_LIMITS} == "unlimited" ]; then
   echo "Core's production is ENABLED. <${CORE_LIMITS}>"
fi

Separator

# ==========================================================
# === E N D ================================================
# ==========================================================

