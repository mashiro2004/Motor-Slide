#! /bin/bash
i=1
scatti=$2

while true ; do
echo "1 0 0 0"
echo "0 1 0 0"
echo "0 0 1 0"
echo "0 0 0 1"
if [ $1 = $i ] 
then
echo "scatta"
c=$((c+1))
i=1
if [ $c = $scatti ]
then
break
fi
else
i=$((i+1))
fi
echo "1 0 0 0"
echo "0 1 0 0"
echo "0 0 1 0"
echo "0 0 0 1"
if [ $1 = $i ] 
then
echo "scatta"
c=$((c+1))
i=1
if [ $c = $scatti ]
then
break
fi
else
i=$((i+1))
fi
done
