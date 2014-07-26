#!/bin/bash
#
# ==========================================================
# ==========================================================
# THE NOW FACTORY
# http://www.thenowfactory.com
#
# Author: Agustin Fernandez
# Creation date: 22/Oct/2009
#
# Description: This script deletes files which are:
#
#    - In the directory specified.
#    - Match file format specified.
#    - Older than number of N (hours) specified.
#
#  CRONTAB:
#
#  */10 * * * * /apps/midas/scripts/cleaningFS.sh > /dev/null 2>&1
#
#
# ==========================================================
# =============  C H A N G E S    L O G  ===================
# ==========================================================
#  Date             Author                 Description
# ==========================================================
#
#  06/Jan/2009      Agustin Fernandez      kick off
#  22/Oct/2009      Agustin Fernandez      Modified to work with hours instead days
#  24/Jun/2011      Agustin Fernandez      Modified to removed dlauncher logs
#
#
#
# ==========================================================
# === U S E R   S E T T I N G S ============================
# ==========================================================

#   -----------------------------------------------------------------
#   Equivalence: days into hours:
#   -----------------------------------------------------------------
#  | 1 -  24 | 11 - 264 | 21 - 504 | 31 - 744 | 41 -  984 | 51 - 1224 |
#  | 2 -  48 | 12 - 288 | 22 - 528 | 32 - 768 | 42 - 1008 | 52 - 1248 |
#  | 3 -  72 | 13 - 312 | 23 - 552 | 33 - 792 | 43 - 1032 | 53 - 1272 |
#  | 4 -  96 | 14 - 336 | 24 - 576 | 34 - 816 | 44 - 1056 | 54 - 1296 |
#  | 5 - 120 | 15 - 360 | 25 - 600 | 35 - 840 | 45 - 1080 | 55 - 1320 |
#  | 6 - 144 | 16 - 384 | 26 - 624 | 36 - 864 | 46 - 1104 | 56 - 1344 |
#  | 7 - 168 | 17 - 408 | 27 - 648 | 37 - 888 | 47 - 1128 | 57 - 1368 |
#  | 8 - 192 | 18 - 432 | 28 - 672 | 38 - 912 | 48 - 1152 | 58 - 1392 |
#  | 9 - 216 | 19 - 456 | 29 - 696 | 39 - 936 | 49 - 1176 | 59 - 1416 |
#  |10 - 240 | 20 - 480 | 30 - 720 | 40 - 960 | 50 - 1200 | 60 - 1440 |


# LIST FORMAT: [/Directory/to/clean/]|[files pattern]|[number of hours to keep]

MyList=" /apps/midas/bin/MANAGE/process/dacas/log/|*.log.gz|6                   \
         /apps/midas/bin/MANAGE/process/dacas/log/|*.log|2                      \
         /apps/midas/bin/MANAGE/process/dacas/reservedlog/|*.log.gz|6           \
         /apps/midas/bin/MANAGE/process/dacas/reservedlog/|*.log|1              \
         /apps/midas/bin/MANAGE/process/dacas/reservedlogMoMo/|*.log.gz|6       \
         /apps/midas/bin/MANAGE/process/dacas/reservedlogMoMo/|*.log|1          \
         /apps/midas/bin/MANAGE/process/dacas/netrofeed/|*.log.gz|6             \
         /apps/midas/bin/MANAGE/process/dacas/netrofeed/|*.log|1                \
         /apps/midas/bin/MANAGE/process/dacas/pagebasedqoe_binary/|*.log.gz|6   \
         /apps/midas/bin/MANAGE/process/dacas/pagebasedqoe_binary/|*.log|1      \
         /apps/midas/bin/MANAGE/process/dacas/reducednetrofeed/|*.log.gz|6      \
         /apps/midas/bin/MANAGE/process/dacas/reducednetrofeed/|*.log|1         \
         /apps/midas/bin/MANAGE/process/dacas/pagebasedqoe/|*.log.gz|6          \
         /apps/midas/bin/MANAGE/process/dacas/pagebasedqoe/|*.log|1             \
         /apps/midas/bin/MANAGE/process/dacas/clickstream/|*.log.gz|6           \
         /apps/midas/bin/MANAGE/process/dacas/clickstream/|*.log|1              \
         /apps/midas/bin/MANAGE/process/dacas/billshock/|*.log.gz|6             \
         /apps/midas/bin/MANAGE/process/dacas/billshock/|*.log|1                \
         /apps/midas/bin/MANAGE/process/dacas/blog/|*.log.gz|6                  \
         /apps/midas/bin/MANAGE/process/dacas/blog/|*.log|1                     \
         /apps/midas/bin/MANAGE/process/dacas/trace/|*.log.gz|240               \
         /apps/midas/bin/MANAGE/process/dacas/trace/|*.log|240                  \
         /apps/midas/bin/MANAGE/process/dacas/stat/|*.log.gz|240                \
         /apps/midas/bin/MANAGE/process/dacas/stat/|*.log|240                   \
         /apps/midas/scripts/output/|*.csv|720                                  \
         /apps/midas/scripts/output/|*.log|360                                  \
         /apps/midas/admin/|*.log|240                                           \
         /apps/midas/bin/MANAGE/process/dacas/|core.*|1                         "



function ClearFilesSystem {

   for i in ${MyList}; do

      MyDir="`echo $i      | /usr/bin/cut -d'|' -f1`"
      MyFiles="`echo $i    | /usr/bin/cut -d'|' -f2`"
      MyNumHours="`echo $i | /usr/bin/cut -d'|' -f3`"

      # minutes=`echo "${MyNumHours} * 60" | /usr/bin/bc`
      minutes=`/usr/bin/perl -e "print ${MyNumHours} * 60;"`	  

      if [ -d ${MyDir} ]; then
         /usr/bin/find ${MyDir} -name "${MyFiles}" -mmin +${minutes} -exec /bin/rm -f {} \;
      fi

   done
}


# ================ M A I N  P R O G R A M =====================

ClearFilesSystem

