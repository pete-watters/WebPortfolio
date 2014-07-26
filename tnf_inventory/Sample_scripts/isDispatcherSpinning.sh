#!/bin/bash

# ==========================================================
# ==========================================================
# THENOWFACTORY
#
# Author: Agustin Fernandez
# Creation date: 26/Jul/2011
#
# DESCRIPTION: This script determines if dispatcher is spinning.
#
# INPUT:
#
#  - To check dispatcher has been spinning in last  2 hours: isDispatcherSpinning.sh 120
#  - To check dispatcher has been spinning in last 24 hours: isDispatcherSpinning.sh 1440
#
#
# OUTPUT Sample:
#
# /apps/midas/scripts/isDispatcherSpinning.sh 1440
# 25/07/2011 20:16:47 Producing
# 25/07/2011 22:54:48 Spinning
# 25/07/2011 22:59:40 Producing
# 26/07/2011 07:11:40 Spinning
# 26/07/2011 07:14:48 Producing
#
# CRONTAB:  No crontab requiered for now
#
#
# ==========================================================
# =============  C H A N G E S    L O G  ===================
# ==========================================================
#  Date             Author                 Description
# ==========================================================
#
#  26/Jul/2011      Agustin Fernandez      kick off
#  28/Jul/2011      Agustin Fernandez      validating existence of awk bin and program
#
#
# ==========================================================
# ==========================================================


# ==========================================================
# === U S E R   S E T T I N G S ============================
# ==========================================================
StatsDir="/apps/midas/bin/MANAGE/process/dacas/stats/"
StatsFileName="stat*.log"
StatsString="Total bytes sent to thread ="



# ==========================================================
# === O T H E R     S E T T I N G S ========================
# ==========================================================
NOW="`/bin/date +'%Y%m%d%H%M%S'`"
ScriptName="`/usr/bin/basename $0`"
AwkProgram="${0}.awk"
StatsOutput="/tmp/${ScriptName}_${NOW}_StatsOutput.$$.tmp"
TempStats="/tmp/${ScriptName}_${NOW}_stats.$$.tmp"
AWK="/usr/bin/gawk"
MINs="$1"



# ==========================================================
# === V A L I D A T I O N S ================================
# ==========================================================

[ -z "${MINs}" ] && MINs="60"

if [ ! -s ${AwkProgram} ]; then
   echo "Not found awk program: ${AwkProgram} script aborted!."
   exit 1
fi

if [ ! -d ${StatsDir} ]; then
   echo "Not found directory: ${StatsDir} script aborted!."
   exit 1
fi

[ ! -x ${AWK} ] && AWK="/usr/bin/awk"



# ==========================================================
# === M A I N  P R O G R A M  ==============================
# ==========================================================

   # Get interval specified by customer in minutes
   t1="`/bin/date --date=\"${MINs} min ago\" +'%d/%m/%Y %H:%M:%S'`"
   t2="`/bin/date +'%d/%m/%Y %H:%M:%S'`"

   # Generating a list of TDRs files to be processed.
   /usr/bin/find ${StatsDir} -name "${StatsFileName}" -nowarn -maxdepth 1 -mmin -${MINs} -exec /bin/grep -e "${StatsString}" {} \; | ${AWK} '{print $1,$2,$10}' | /usr/bin/sort > ${StatsOutput}

   if [ ! -s ${StatsOutput} ]; then
      echo "String: \"${StatsString}\" not found in: ${StatsDir}${StatsFileName} in last ${MINs} minutes."
   else
      /bin/cat ${StatsOutput} | ${AWK} -f ${AwkProgram} -v t1="${t1}" -v t2="${t2}"
      /bin/rm -f ${StatsOutput}
   fi


# ==========================================================
# === E N D ================================================
# ==========================================================

