# Author: Agustin Fernandez,

# Kick off:  16/Dec/2009
# Updated:   13/Jun/2011
# Updated:   03/Jul/2011

ProbeName="`/bin/uname -n`"

echo "Below PCAPs are being produced on real time in ($ProbeName):"
/usr/bin/lsof -c swriter 2> /dev/null | /bin/egrep -e 'tmp$|pcap$' | /bin/egrep -v "idx" | /usr/bin/awk '{printf "%14s  %s\n", $7,$9}' | /usr/bin/sort -k2

echo; echo "Below TDRs are being produced on real time in ($ProbeName):"
/usr/bin/lsof -c dacas 2> /dev/null | /bin/grep -e 'log$' | /bin/egrep -v "dlauncher|stat|trace|sgsns0|lsof|find|gzip|grep|tar|rsync" | /usr/bin/awk '{printf "%12s  %s\n", $7,$9}' | /usr/bin/sort -k2

echo; echo "Below FTP DOWNLOADs on current minute in ($ProbeName):"
/usr/bin/tail -1000 /var/log/vsftpd.log | /bin/egrep "`/bin/date +'%H:%M:'`" | /bin/egrep "OK DOWNLOAD|OK DELETE|FAILED" |  /usr/bin/awk '{printf "%s %12s %s %s\n", substr($4,1,5),$8,$9,$10}' | /usr/bin/sort | /usr/bin/uniq -c | /usr/bin/sort -nrk1

echo
