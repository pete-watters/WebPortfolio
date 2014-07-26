#!/bin/bash

# ==========================================================
# ==========================================================
# THENOWFACTORY    www.thenowfactory.com
#
# Author: Agustin Fernandez
# Creation date: 18/Aug/2011
#
# DESCRIPTION: This script fixes 'Failed' & 'UnConfigured'
#              disks when it is possible.
#
# INPUT:  No input requiered
#
# CRONTAB:
#
#  Check MegaSAS RAID status and fixs it when possible
#  */7 * * * * /apps/midas/scripts/check_MegaSAS.sh > /dev/null 2>&1
#
#
# ==========================================================
# ===========  DISKs STATES  Explanation ===================
# ==========================================================
#
# :Failed:
# A physical disk that was originally configured as Online or
# Hot Spare, but on which the firmware detects an unrecoverable
# error.
#
# :Unconfigured(Bad):
# A physical disk on which the firmware detects an unrecoverable
# error; the physical disk was Unconfigured Good or the physical
# disk could not be initialized.
#
# :Rebuild:
# A physical disk to which data is being written to restore full
# redundancy for a virtual disk.
#
# :Missing:
# A physical disk that was Online but which has been removed from
# its location.
#
# :Offline:
# A physical disk that is part of a virtual disk but which has
# invalid data as far as the RAID configuration is concerned.
#
#
# ==========================================================
# =============  C H A N G E S    L O G  ===================
# ==========================================================
# Date         Author             Ver  Description
# ==========================================================
#
# 18/Aug/2011  Agustin Fernandez  1.0  Fixs Failed disks
# 22/Aug/2011  Agustin Fernandez  1.1  Fixs UnConfigure disks
# 22/Aug/2011  Agustin Fernandez  1.2  Fixs UnConfigure(bad) disks
# 29/Aug/2011  Agustin Fernandez  1.3  Retrieves Rebuilding process rate when happens
#                                      Abort script when RAID controler is not responding
# 29/Aug/2011  Agustin Fernandez  1.4  Removes Rebuilding temporary file
# 29/Aug/2011  Agustin Fernandez  1.5  Small bug fixed. Script writes into log file properly now.
# 30/Aug/2011  Agustin Fernandez  1.6  Beeping is silence always instead when RAID is degraded.
# 30/Aug/2011  Agustin Fernandez  1.7  PID added to logs file.
# 31/Aug/2011  Agustin Fernandez  1.7  Added disk' states explanation.
#
# ==========================================================
VERSION="1.7      This script fixes disks & RAIDs when possible."


# ==========================================================
# ===  S E T T I N G S =====================================
# ==========================================================
MEGACLI="/usr/sbin/MegaCli"
AWK="/usr/bin/awk"
TODAY="`/bin/date +'%Y.%m.%d'`"
TEMP_DIR="/tmp/"
SCRIPT_NAME="`/usr/bin/basename $0`"
MegaSAS_VD="${TEMP_DIR}${SCRIPT_NAME}.VD.$$.tmp"
MegaSAS_FD="${TEMP_DIR}${SCRIPT_NAME}.FD.$$.tmp"
Failed_Disks="${TEMP_DIR}${SCRIPT_NAME}.Failed-Disks.$$.tmp"
Unconfigured_Disks="${TEMP_DIR}${SCRIPT_NAME}.Unconfigured-Disks.$$.tmp"
Rebuild_Disks="${TEMP_DIR}${SCRIPT_NAME}.Rebuild-Disks.$$.tmp"
LOGs_DIR="/apps/midas/scripts/output/MegaSAS/"
LOGs_PREFIX="MegaSAS-Status"
LOGs_EXT=".log"
LOGs_FILE="${LOGs_DIR}${LOGs_PREFIX}.${TODAY}${LOGs_EXT}"
REMOVE_AFTER_N_DAYS="90"



# ==========================================================
# ===  F U N C T I O N S  ==================================
# ==========================================================

function log {
   RightNow="`/bin/date +'%Y.%m.%d %H:%M:%S'`"
   echo "${RightNow} ($$) $1" | /usr/bin/tee -a ${LOGs_FILE}
}



function validations {

   [ $1 ] && check_Script_Release "$1"

   [ ! -d ${LOGs_DIR} ] && /bin/mkdir -p ${LOGs_DIR}

   [ -e ${LOGs_FILE} ]  && /usr/bin/touch ${LOGs_FILE}

   CheckInstances

   if [ ! -x ${MEGACLI} ]; then
      log "Not found binary: ${MEGACLI}, script aborted!"
      exit 1
   fi

   if [ ! -x ${AWK} ]; then
      log "Not found binary: ${AWK} script aborted!"
      exit 1
   fi

   check_MegaCli_bin 
}



function check_Script_Release {

   ([ "$1" == "-v" ] || [ "$1" == "-V" ]) && echo "${SCRIPT_NAME} ${VERSION}" && exit 0
}



function CheckInstances {

   ScriptName="`/usr/bin/basename $0`"
   Instances="${TEMP_DIR}${ScriptName}.Instances.$$.tmp"
   myTimeStamp="`/bin/date +'%Y.%m.%d %H:%M:%S'`"

   /usr/bin/lsof | /bin/grep -e "${ScriptName}$" | /bin/grep -v $$  >  ${Instances}

   if [ -s ${Instances} ]; then
      log "Another instance of ${ScriptName} is still running, aborting current script!"
      /bin/rm ${Instances}
      exit 1
   fi
   /bin/rm ${Instances}
}



function check_MegaCli_bin {

   ${MEGACLI} -v | /bin/egrep -e '2009$' > /dev/null 2>&1
   if [ $? -eq 1 ]; then
      log "This script works with: MegaCli 'Ver 5.00.14 July 14, 2009' only. Script aborted!"
      exit 1
   fi
}



function get_RAID_Status {

   ${MEGACLI} -PDList -aAll > ${MegaSAS_FD}

   if [ $? -eq 1 ]; then
      log "RAID controler is not responding. Script aborted!"
      exit 1
   fi
     
   ${MEGACLI} -CfgDsply -aALL > ${MegaSAS_VD}

   /bin/cat ${MegaSAS_VD} | ${AWK} '                        \
   ($0 ~ /^DISK GROUPS:/)         {printf "\n%s",$0}        \
   ($0 ~ /^Number of PDs:/)       {printf "  %s %s",$3,$4}  \
   ($0 ~ /^Number of VDs:/)       {printf "  %s %s",$3,$4}  \
   ($0 ~ /^State:/)               {printf "  %s",$0}        \
   ($0 ~ /^RAID Level:/)          {printf "  %s",$3}        \
   ($0 ~ /^Enclosure Device ID:/) {printf "\n%s",$4}        \
   ($0 ~ /^Slot Number:/)         {printf " %s",$3}         \
   ($0 ~ /^Firmware state:/)      {printf " %s",$3}         \
   END {printf "\n"}' | /usr/bin/tee -a ${LOGs_FILE}
}



function check_Failed_disks {

   /bin/cat ${MegaSAS_FD} | ${AWK} '           \
   ($0 ~ /^Enclosure Device ID:/)    {ENC=$4}  \
   ($0 ~ /^Slot Number:/)            {SLT=$3}  \
   ($0 ~ /^Firmware state: Failed/)  {printf "%s %s %s\n",ENC,SLT,$3}'  > ${Failed_Disks}

   if [ -s ${Failed_Disks} ]; then
      while read line; do
         log "found: $line"
         ENC="`echo $line | /usr/bin/cut -d' ' -f1`"
         SLT="`echo $line | /usr/bin/cut -d' ' -f2`"
         ${MEGACLI} -PDOnline -PhysDrv[${ENC}:${SLT}] -a0 | /usr/bin/tee -a ${LOGs_FILE}
      done < ${Failed_Disks}
   else
      log "Not found 'Failed' disks"
   fi
}



function check_Unconfigured_disks {

   /bin/cat ${MegaSAS_FD} | ${AWK} '           \
   ($0 ~ /^Enclosure Device ID:/)    {ENC=$4}  \
   ($0 ~ /^Slot Number:/)            {SLT=$3}  \
   ($0 ~ /^Firmware state: Unconfigured/)  {printf "%s %s %s\n",ENC,SLT,$3}'  > ${Unconfigured_Disks}

   if [ -s ${Unconfigured_Disks} ]; then
      while read line; do
         log "found: $line"
         ENC="`echo $line | /usr/bin/cut -d' ' -f1`"
         SLT="`echo $line | /usr/bin/cut -d' ' -f2`"
         STA="`echo $line | /usr/bin/cut -d' ' -f3`"
         if [ "${STA}" == "Unconfigured(bad)" ]; then
            ${MEGACLI} -PDMakeGood -physDrv[${ENC}:${SLT}] -a0  | /usr/bin/tee -a ${LOGs_FILE}
         fi
         ${MEGACLI} -CfgForeign -Scan  -a0                      | /usr/bin/tee -a ${LOGs_FILE}
         ${MEGACLI} -CfgForeign -Clear -a0                      | /usr/bin/tee -a ${LOGs_FILE}
         ${MEGACLI} -PDHSP -Set -physDrv[${ENC}:${SLT}] -a0     | /usr/bin/tee -a ${LOGs_FILE}
      done < ${Unconfigured_Disks}
   else
      log "Not found 'Unconfigured' disks"
   fi
}



function check_Rebuild_disks {

   /bin/cat ${MegaSAS_FD} | ${AWK} '           \
   ($0 ~ /^Enclosure Device ID:/)    {ENC=$4}  \
   ($0 ~ /^Slot Number:/)            {SLT=$3}  \
   ($0 ~ /^Firmware state: Rebuild/)  {printf "%s %s %s\n",ENC,SLT,$3}'  > ${Rebuild_Disks}

   if [ -s ${Rebuild_Disks} ]; then
      while read line; do
         log "found: $line"
         ENC="`echo $line | /usr/bin/cut -d' ' -f1`"
         SLT="`echo $line | /usr/bin/cut -d' ' -f2`"
         STA="`echo $line | /usr/bin/cut -d' ' -f3`"
         ${MEGACLI} -PDRbld -ShowProg -PhysDrv [${ENC}:${SLT}] -a0   | /usr/bin/tee -a ${LOGs_FILE}
      done < ${Rebuild_Disks}
   else
      log "Not found 'Rebuild' disks"
   fi
}



function Silence_Alarm {

   ${MEGACLI} -AdpSetProp AlarmSilence -aAll  |  /usr/bin/tee -a ${LOGs_FILE}
}



function remove_tempFiles {

   [ -e ${MegaSAS_VD} ]         && /bin/rm -f ${MegaSAS_VD}
   [ -e ${MegaSAS_FD} ]         && /bin/rm -f ${MegaSAS_FD}
   [ -e ${Failed_Disks} ]       && /bin/rm -f ${Failed_Disks}
   [ -e ${Unconfigured_Disks} ] && /bin/rm -f ${Unconfigured_Disks}
   [ -e ${Rebuild_Disks} ]      && /bin/rm -f ${Rebuild_Disks}   
   
}



function CleanUp_Old_Logs {

    /usr/bin/find ${LOGs_DIR} -name "${LOGs_PREFIX}*${LOGs_EXT}" -mtime +$1 -exec /bin/rm {} \; -print | /usr/bin/tee -a "${LOGs_FILE}"
}


# ==========================================================
# === M A I N  P R O G R A M ===============================
# ==========================================================

   validations  "$1"

   log "Script starts ..."

   get_RAID_Status

   check_Failed_disks

   check_Unconfigured_disks

   check_Rebuild_disks
   
   Silence_Alarm

   remove_tempFiles

   CleanUp_Old_Logs "${REMOVE_AFTER_N_DAYS}"

   log "Script finished."

# ==========================================================
# === E N D ================================================
# ==========================================================
