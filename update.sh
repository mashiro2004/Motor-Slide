#!/bin/sh

echo 15 > /sys/class/gpio/unexport
systemctl stop gpio.service
systemctl stop httpd
wget https://raw.githubusercontent.com/mashiro2004/Motor-Slide/master/init.sh
mv /usr/bin/rasp/init.sh /usr/bin/rasp/init.old
cp init.sh /usr/bin/rasp/
systemctl start gpio.service
wget https://raw.githubusercontent.com/mashiro2004/Motor-Slide/master/phptest.php
cp phptest.php /var/www/html/
chown apache:apache /var/www/html/phptest.php
systemctl start httpd