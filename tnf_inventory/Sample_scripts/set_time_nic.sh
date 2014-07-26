#!/bin/bash

VERSION="0.1 18/02/2011 Federico Prando Gigi Maori"
# set date and time on ipblaze card

cd /proc/driver/ipblaze/0/regs

l=$(cat MiscTimeStampLow)
h=$(cat MiscTimeStampHigh)


ts=$(date "+%s%N") 
cmd=$(printf "echo %08x > MiscTimeStampLow ; echo %08x > MiscTimeStampHigh ;" $[$ts&0xffffffff] $[$ts>>32] ) 
#echo $cmd
bash -c "$cmd"

l=$(cat MiscTimeStampLow)
h=$(cat MiscTimeStampHigh)

