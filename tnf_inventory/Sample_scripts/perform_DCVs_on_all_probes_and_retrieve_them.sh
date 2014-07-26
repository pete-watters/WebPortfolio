#!/bin/bash

# ==========================================================
# ==========================================================
# Company: THE NOW FACTORY
# Website: http://www.thenowfactory.com/
#
# Author: Agustin Fernandez
# Creation date: 24/Mar/2009
#
# DESCRIPTION: This script runs and retrieved yesterday's DCVs from all probes.
#
# INPUT:  No input expected
#
# OUPUT:  a DCV report is generated and retrieved from each probe.
#
# CRONTAB:
#
# 15 4 * * * /apps/midas/scripts/perform_DCVs_on_all_probes_and_retrieve_them.sh > /dev/null 2>&1
#
# ==========================================================
# =============  C H A N G E S    L O G  ===================
# ==========================================================
#  Date         Author             Ver   Description
# ==========================================================
#
#  24/Mar/2009  Agustin Fernandez   1.0  Kick off
#  29/Jul/2011  Agustin Fernandez   1.1  Adapted to run from crontab and retrieve DCV from previous day.
#  02/Aug/2011  Agustin Fernandez   1.2  Added: DCV.pl (DCV 3.0.0's new script name)
#
# ==========================================================
VERSION="1.2   This script runs and retrieved yesterday's DCVs from all probes"



# =============================================================
# === ADMINISTRATOR SETTINGS SECTION    =======================
# =============================================================

# ProbesList Format: PerformAction|SiteName|SiteIPAddress|SSH Port
MyProbesList="   |ProbeName|ProbeIP|2222    \
                #|ProbeName|ProbeIP|2222    \
                #|ProbeName|ProbeIP|2222    \
                #|ProbeName|ProbeIP|2222    "


DCV_Options="-m 16"


# =============================================================
# ===  OTHER SETTINGS =========================================
# =============================================================
PERIOD="`/bin/date -dyesterday +'%Y%m%d'`"
DCV_Options="-m 16"
DCVs_DIR="/d0/DCVs/"
user="root"


# =============================================================
# ===   VALIDATIONS    ========================================
# =============================================================

# Valindating DCV script
if [ -x "/apps/midas/scripts/DCV.pl" ]; then
   DCV_Script="/apps/midas/scripts/DCV.pl"
elif [ -x "/apps/midas/scripts/DCV_xls.pl" ]; then
   DCV_Script="/apps/midas/scripts/DCV_xls.pl"
elif  [ -x "/apps/midas/scripts/stat_xls.pl" ]; then
   DCV_Script="/apps/midas/scripts/stat_xls.pl"
else
   echo "dacas DCV package not deployed on this probe."
   exit 1
fi


# Valindating DCV output directory
if [ ! -d ${DCVs_DIR} ]; then
   /bin/mkdir -p ${DCVs_DIR}
fi


# =============================================================
# ===   M A I N   P R O G R A M  ==============================
# =============================================================


# -------- CHECK RELEASE -----------
([ "$1" == "-v" ] || [ "$1" == "-V" ]) && echo "`/usr/bin/basename $0`  ${VERSION}" && exit 0


for site in `echo ${MyProbesList}`
do

 ProbeAction="`echo ${site} | /usr/bin/cut -d'|' -f1`"
   ProbeName="`echo ${site} | /usr/bin/cut -d'|' -f2`"
     ProbeIP="`echo ${site} | /usr/bin/cut -d'|' -f3`"
   ProbePort="`echo ${site} | /usr/bin/cut -d'|' -f4`"


   if [ ! ${ProbeAction} ]; then

      echo "Site: ${ProbeName} (${ProbeIP})"

      DCVFileName="/tmp/DCV_${ProbeName}_${ProbeIP}_${PERIOD}.xls"
      DCVZippedName="${DCVFileName}.gz"

      # DCV report is generated
      /usr/bin/ssh -p${ProbePort} ${user}@${ProbeIP} "${DCV_Script} ${DCV_Options} -o ${DCVFileName} -t ${PERIOD}; /bin/gzip -f ${DCVFileName}"

      # DCV report is zipped in remote probe
      /usr/bin/scp -p -P${ProbePort} ${user}@${ProbeIP}:${DCVZippedName} ${DCVs_DIR}

      # DCV report retrieved to local probe
      /usr/bin/ssh -p${ProbePort} ${user}@${ProbeIP} "/bin/rm ${DCVZippedName}"

   fi

done
