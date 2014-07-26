#!/usr/bin/env bash
# ==========================================================
# ==========================================================
# THE NOW FACTORY
#
# Author: Agustin Fernandez
# Creation date: 24/Mar/2009
#
# DESCRIPTION: This script makes a core analysis and keep
# an report for N days for further investigation. Core is
# removed after be analyzed.
#
# INPUT:   No input expected
#
# OUPUT:
#
#   /apps/midas/scripts/output/cores/core.2017.txt
#   /apps/midas/scripts/output/cores/core.3012.txt
#   /apps/midas/scripts/output/cores/core.6872.txt
#
# CRONTAB:
#
#  # Core analyser, cores are removed after be analyzed
#  10 */2 * * * /usr/bin/nice /apps/midas/scripts/core_analysis.sh > /dev/null 2>&1
#
#
#
# ==========================================================
# =============  C H A N G E S    L O G  ===================
# ==========================================================
#  Date             Author                 Description
# ==========================================================
#
#  09/Mar/2009      Agustin Fernandez      kick off
#  22/Jun/2011      Hakan Olsson           Added localagent and swriter cores
#
# ==========================================================
# ==========================================================


# ==========================================================
# === U S E R  S E T T I N S ===============================
# ==========================================================

CORES_FORMAT="core.*"
DACAS_BIN="/apps/midas/bin/dacas"
CORES_DIR="/apps/midas/bin/MANAGE/process/dacas"
SWRITER_BIN="/apps/midas/bin/swriter"
SWRITER_CORES_DIR="/apps/midas/bin/MANAGE/process/swriter"
LOCALAGENT_BIN="/apps/midas/bin/localagent"
LOCALAGENT_CORES_DIR="/apps/midas/bin/MANAGE/process/localagent"
DATE="/bin/date"
GDB="/usr/bin/gdb"
GDB_Options="--batch --quiet -ex bt -ex quit"
Output_DIR="/apps/midas/scripts/output/cores"
KeepDays=30


# ==========================================================
# === Validations ==========================================
# ==========================================================

if [ ! -d "${CORES_DIR}" ]; then
   echo "Not found directory: ${CORES_DIR}, script aborted."
   exit 1
fi

if [ ! -x "${DACAS_BIN}" ]; then
   echo "Not found dacas binary: ${DACAS_BIN}, script aborted."
   exit 1
fi

if [ ! -x "${GDB}" ]; then
   echo "Not found core's analyzer: ${GDB}, script aborted."
   exit 1
fi

if [ ! -d "${Output_DIR}" ]; then
   /bin/mkdir -p ${Output_DIR}
fi



# ==========================================================
# === M A I N  P R O G R A M ===============================
# ==========================================================
NOW=`${DATE} +'%Y.%m.%d_%H.%M.%S'`

for Mycore in ${CORES_DIR}/${CORES_FORMAT}           \
              ${SWRITER_CORES_DIR}/${CORES_FORMAT}   \
              ${LOCALAGENT_CORES_DIR}/${CORES_FORMAT}
do
   if [ -e ${Mycore} ]; then

      # Each core found is analised
      Core_Name="`/usr/bin/basename ${Mycore}`"
      ${GDB} ${DACAS_BIN} ${Mycore} ${GDB_Options} > "${Output_DIR}/${Core_Name}.${NOW}.txt"

      # Core is removed after be analyzed.
      /bin/rm -f ${Mycore}
   fi
done

# Removing core's reports older than N days
/usr/bin/find ${Output_DIR} -name "${CORES_FORMAT}" -mtime +${KeepDays} -exec /bin/rm -f {} \; -print


# ==========================================================
# === E N D ================================================
# ==========================================================

