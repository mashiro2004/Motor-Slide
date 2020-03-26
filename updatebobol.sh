#!/bin/sh

echo 15 > /sys/class/gpio/unexport
systemctl stop gpio.service
systemctl stop httpd
wget https://raw.githubusercontent.com/mashiro2004/Motor-Slide/master/initbobol.sh
mv /usr/bin/rasp/init.sh /usr/bin/rasp/init.old
cp initbobol.sh /usr/bin/rasp/
mv /usr/bin/rasp/initbobol.sh init.sh
systemctl start gpio.service
wget https://raw.githubusercontent.com/mashiro2004/Motor-Slide/master/bobol.php
rm -f /var/www/html/phptest.php
cp bobol.php /var/www/html/
mv /var/www/html/bobol.php /var/www/html/phptest.php
chown apache:apache /var/www/html/phptest.php
systemctl start httpd