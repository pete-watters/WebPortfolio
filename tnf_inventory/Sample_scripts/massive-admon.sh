#!/usr/bin/env bash
# ==========================================================
# ==========================================================
# THE NOW FACTORY
#
# Author: Agustin Fernandez
# Creation date: 24/Mar/2009
# Updated on:    27/Jun/2011
#
# DESCRIPTION: This script performs a batch of actions on probes 



# =============================================================
# ======= V A L I D A T I O N S  ==============================
# =============================================================
ConfigFile="${0}.cfg"
[ ! -s ${ConfigFile} ] && echo "Not found config file: ${ConfigFile}" && exit 1
source ${ConfigFile}


# =============================================================
# ===   WARNING  ==============================================
# =============================================================
clear; echo; echo
echo "CAUTION !! you are about perform actions on many probes"
echo "any wrong action could cause a disaster on all of them."
echo "Please make sure you know what you are doing"; echo
echo "Do you wish to proceed?"
echo "Press <Enter> to continue or <Control+c> to cancel"
read



# =============================================================
# ===   Actions to perform on all probes   ====================
# =============================================================
for site in `echo ${MyProbesList}`
do

 ProbeAction="`echo ${site} | /usr/bin/cut -d'|' -f1`"
   ProbeName="`echo ${site} | /usr/bin/cut -d'|' -f2`"
     ProbeIP="`echo ${site} | /usr/bin/cut -d'|' -f3`"
   ProbePort="`echo ${site} | /usr/bin/cut -d'|' -f4`"


   if [ ! ${ProbeAction} ]; then

      echo; echo "Site: ${ProbeName} (${ProbeIP})"

      if [ -n "$1" ]; then

         /usr/bin/ssh -p${ProbePort} ${user}@${ProbeIP} "$1"
		 
      else

# =====================================	  

#  /usr/bin/ssh -p${ProbePort} ${user}@${ProbeIP} "date"

#  /usr/bin/ssh -p${ProbePort} ${user}@${ProbeIP} "df -h | grep /dev/"

#  /usr/bin/scp -p -P${ProbePort} /apps/midas/scripts/cleaningFS.sh ${user}@${ProbeIP}:/apps/midas/scripts/

#  /usr/bin/scp -p -P${ProbePort} ${user}@${ProbeIP}:/etc/hosts /tmp

# =====================================

         echo
      fi	  
   else
      echo; echo "Site: ${ProbeName}, No action performed on this probe."; echo
   fi
done
