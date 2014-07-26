#!/usr/bin/env /bin/bash
#
# ==========================================================
# THE NOW FACTORY
# http://thenowfactory.com
# Author: Agustin Fernandez
# Creation date: 05/Oct/2009
# =============  C H A N G E S    L O G  ===================
#          please refer to svn for changelog!

VERSION="$0 Version - 1.1 24/01/2011"

# === Z I P L O G   U S E R   S E T T I N S ================
#     YOU CAN CUSTOMIZE THIS PARAMETERS ONLY

# Directories where TDRs files are being compressed. Format: [/TDRsdirectory/|TDRsPrefix_]
DIRsToCompress=" /apps/midas/bin/MANAGE/process/dacas/GERAN/Base/|midas_GERAN_RAO_          \
                 /apps/midas/bin/MANAGE/process/dacas/UTRAN/Base/|midas_UTRAN_RAO_          "

# User and Group for downloading TDRs files generated.
USER="touchpoint"
GROUP="touchpoint"

# Max TDRs file's size in kb before compressing, expected by customer.
# Usually the ratio is 1-4 (1MB zipped are 4 MB unzipped).
SPLIT_SIZE="150000"

# === O T H E R  S E T T I N G S  ====  Do not modify these ones
NOW="`/bin/date -u +'%Y%m%d%H%M%S'`"
TIME="`/bin/date -u +'%H:%M'`"
TODAY="`/bin/date -u +'%Y%m%d'`"

SCRIPT_NAME="`/usr/bin/basename $0`"
DACAS_PROC="dacas"
OUTPUT_DIR="/apps/midas/scripts/output/zippinglogs/"
WORKING_DIR="${OUTPUT_DIR}/${TODAY}/"
RESERVEDLOG_DIR="/d1/reservedlog/"
DACAS_COMPRESSING_DIR="/apps/midas/bin/MANAGE/process/dacas/compressing/${NOW}/"
TDRs_EXT=".log"
TDRs_NO_ZIPPED="*${TDRs_EXT}"
LIST_TDRs_TO_ZIP="${WORKING_DIR}${SCRIPT_NAME}.${NOW}.initial.list"
OPENED_TDRs="${WORKING_DIR}${SCRIPT_NAME}.${NOW}.excluded.list"
FINAL_LIST_TDRs="${WORKING_DIR}${SCRIPT_NAME}.${NOW}.final.list"
TDRs_PERMISSIONS="666"
COMPRESSOR="/bin/gzip"
COMPRESSOR_EXT=".gz"
KEEP_LOGs=10
DEBUG_FILE="/tmp/debug_${NOW}.log"
DONTRESERVE="0"

SHOW_HELP() { 

	echo -e "DESCRIPTION: $0 does: 
    +  Compress MIDAS, MIDAS+ and NETRO TDRs files to be downloaded by TP. 
    +  Keep debugging logs during N days. 

 EXPLANATION: 
    1 Makes a list of all existing TDRs files from specified directories 
    2 Identify opened TDRs files by dacas (via lsof command) 
      and excludes them from final list of TDRs files to be processed.
    3 Moves listed TDRs files from their original location into a temporary compressing directory. 
    4 Concats all TDRs files:
       + Into one or more files (according to customer's Max file size expected). 
       + Compress them, changes ownership and permissions.
    5 Moves compressed TDRs files to their original locations to be downloaded by TP. 

 CRONTAB: 
   # Compressing TDRs files 
   */2 * * * * /apps/midas/scripts/zippinglogs.sh > /dev/null 2>&1 

 OUTPUT: 
  Debugging log files can be found on  <output/zippinglogs/YYYYMMDD> directory. 
    zippinglogs.sh.20091021112601.debugging.log 
    zippinglogs.sh.20091021112701.debugging.log 
    zippinglogs.sh.20091021112801.debugging.log";  

  exit 0;
}

initialize() {
   # Working directory and debugging file are created.
   [ ! -f "${DEBUG_FILE}" ] && touch ${DEBUG_FILE}
   for CHECK in "${WORKING_DIR}" "${RESERVEDLOG_DIR}" ; do
        if  [ ! -d ${CHECK} ]; then
           /bin/mkdir -p ${CHECK}
        fi
	touch ${CHECK}/me
	if [ "$?" = 0 ] ; then
	 	rm ${CHECK}/me
	elif [ "$CHECK" = "$WORKING_DIR" ] ; then
			exit 1
	else
		DONTRESERVE="1"
	fi
   done

}

debugging() {
	echo $1 >> ${DEBUG_FILE}
}

get_TDRs_list_to_process() {

   # We get a list of TDRs files ready to be compressed
   # from directories specified by user.

   # Temporary files are initialized.
   > ${LIST_TDRs_TO_ZIP}
   > ${OPENED_TDRs}
   > ${FINAL_LIST_TDRs}

   # Generating a list of <.log> files to process.
   /usr/bin/find ${CURRENT_TDRs_DIR} -name "${TDRs_NO_ZIPPED}" | /usr/bin/sort > ${LIST_TDRs_TO_ZIP}

   if [ ! -s ${LIST_TDRs_TO_ZIP} ]; then
      echo "No TDRs files found in: ${CURRENT_TDRs_DIR}. Compressing process skipped."
      continue
   else
      # Generating a list of <.log> files currently opened by dacas which are being currently feed yet.
      /usr/bin/lsof -c ${DACAS_PROC} | /bin/grep -e "${TDRs_EXT}\$" | /usr/bin/awk '{print $9}' > ${OPENED_TDRs}

      # Here are excluded opened <.log> files from final list.
      for myTdrsFile in `/bin/cat ${LIST_TDRs_TO_ZIP}`;  do
         /bin/grep -h "${myTdrsFile}" ${OPENED_TDRs} > /dev/null
         if [ $? -eq 1 ]; then
            echo ${myTdrsFile} >> ${FINAL_LIST_TDRs}
         fi
      done
   fi
}

compressing_TDRs_file() {

   # Once we have a TDRs file concatenated it is compressed

   CONCATED_FILE_SIZE="`/usr/bin/du -sk ${CONCATED_TDRs_FILE} | /usr/bin/awk '{print $1}'`"
   CONCATED_FILE_LINES="`/usr/bin/wc -l ${CONCATED_TDRs_FILE} | /usr/bin/awk '{print $1}'`"
   CONCATED_FILE_NAME="`/usr/bin/basename ${CONCATED_TDRs_FILE}`"
   debugging "Concatenated file: ${CONCATED_FILE_NAME}  Size: ${CONCATED_FILE_SIZE} Kbytes  TDRs: ${CONCATED_FILE_LINES}" 
   ${COMPRESSOR} -f ${CONCATED_TDRs_FILE}

   ZIPPED_FILE="${CONCATED_TDRs_FILE}${COMPRESSOR_EXT}"
   COMPRESSED_FILE_SIZE="`/usr/bin/du -sk ${ZIPPED_FILE} | /usr/bin/awk '{print $1}'`"
   COMPRESSED_FILE_NAME="`/usr/bin/basename ${ZIPPED_FILE}`"

   /bin/chown ${USER}:${GROUP} ${ZIPPED_FILE}
   /bin/chmod ${TDRs_PERMISSIONS} ${ZIPPED_FILE}
    [ "$DONTRESERVE" == "0" ] && /bin/cp -pf ${ZIPPED_FILE} ${RESERVEDLOG_DIR}
   /bin/mv ${ZIPPED_FILE} ${CURRENT_TDRs_DIR}

}

processing_TDRs_list() {

   # TDRs files are moved from original location to compressing
   # directories where are concated and zipped, Once it is done,
   # this/these file/s is/are returned to downloading directory
   #  where TP will collect and remove them.

   if [ ! -s ${FINAL_LIST_TDRs} ]; then
      debugging "All TDRs files are opened by dacas currently. Compressing process skipped."
      continue
   else
      CURRENT_TDRs_PREFIX="${2}"
      CURRENT_COMPRESSING_DIR="${DACAS_COMPRESSING_DIR}${CURRENT_TDRs_PREFIX}/"
      /bin/mkdir -p "${CURRENT_COMPRESSING_DIR}"
   
      CONCATED_TDRs_FILE="${CURRENT_COMPRESSING_DIR}${CURRENT_TDRs_PREFIX}${NOW}${TDRs_EXT}"

      # TDRs files are moved from their original location
      # to temporary directory were are processed.
      for myTDRToProcess in `/bin/cat ${FINAL_LIST_TDRs}` ; do
         FILE_SIZE="`/usr/bin/du -sk  ${myTDRToProcess} | /usr/bin/awk '{print $1}'`"
         FILE_LINES="`/usr/bin/wc -l  ${myTDRToProcess} | /usr/bin/awk '{print $1}'`"
         debugging "Adding ${myTDRToProcess}  Size: ${FILE_SIZE} Kbytes  TDRs: ${FILE_LINES}"

         /bin/cat ${myTDRToProcess} >> "${CONCATED_TDRs_FILE}"
         /bin/rm -f ${myTDRToProcess}

         CONCATED_FILE_SIZE="`/usr/bin/du -sk ${CONCATED_TDRs_FILE} | /usr/bin/awk '{print $1}'`"

         # After concating few TDRs files, resulting file' size is greather
         # than Max size expected by customer, therefore stop adding more
         # files and process current big file.

         if [ ${CONCATED_FILE_SIZE} -gt ${SPLIT_SIZE} ]; then
            debugging "Reached MAX file size of ${SPLIT_SIZE} KBytes expected by customer on:"
            compressing_TDRs_file

            # Once, processed new TDRs file, wait a second in order to get a
            # different timestamp just in case of more TDRs files are being
            # generated afterward.
            /bin/sleep 1
            NOW=`/bin/date -u +'%Y%m%d%H%M%S'`
            CONCATED_TDRs_FILE="${CURRENT_COMPRESSING_DIR}${CURRENT_TDRs_PREFIX}${NOW}${TDRs_EXT}"
         fi

      done

      # After concating few TDRs files, resulting file' size is less
      # than Max size expected by customer and it is processed.
      if [ -s ${CONCATED_TDRs_FILE} ]; then
         debugging "Not reached MAX file size of ${SPLIT_SIZE} KBytes expected by customer on:"
         compressing_TDRs_file
      else
         debugging "No more TDRs files to compress."
      fi

      debugging "Removing compressing directory: ${CURRENT_COMPRESSING_DIR}"
      /bin/rmdir ${CURRENT_COMPRESSING_DIR}
   fi
}

# === M A I N  P R O G R A M ===============================

   # check command line options, if any
   while getopts "vh" OPTION ; do
        case $OPTION in
            v) echo $VERSION
   	       exit 0
                ;;
            h) SHOW_HELP
                ;;
        esac
   done

   # Working directory and debugging file are created.
   initialize

   # Wait a couple of seconds just in case dacas rotates TDRs files
   # because of timing exceeded instead of max file' size reached.
   /bin/sleep 2

   # TDRs are processed according to directory and prefixes specified
   for DIR_SETTINGS in ${DIRsToCompress} ; do

      CURRENT_TDRs_DIR=`echo ${DIR_SETTINGS}    | /usr/bin/cut -d'|' -f1`
      CURRENT_TDRs_PREFIX=`echo ${DIR_SETTINGS} | /usr/bin/cut -d'|' -f2`

      # Generating list of TDRs files to process.
      get_TDRs_list_to_process

      # Processing TDRs files from directory.
      processing_TDRs_list "${CURRENT_TDRs_DIR}" "${CURRENT_TDRs_PREFIX}"

   done

   # Finished whole compressing process, temporary files are removed
   /usr/bin/find ${WORKING_DIR} -name "${DEBUGGING_LISTs}" -exec /bin/rm -f {} \; 

   # Finished compressing process, parent temporary directory is removed
   if [ ${DACAS_COMPRESSING_DIR} != "/" ]; then
      /bin/rm -rf ${DACAS_COMPRESSING_DIR}
   fi;

   # Removed logs files/directories older that N days.
   /usr/bin/find ${OUTPUT_DIR} -type f -mtime +${KEEP_LOGs} -exec /bin/rm -f {} \;
   /usr/bin/find ${OUTPUT_DIR} -type d -mtime +${KEEP_LOGs} -exec /bin/rmdir {} \;
