#! /bin/bash

echo 15 > /sys/class/gpio/export
echo out > /sys/class/gpio/gpio15/direction
echo 23 > /sys/class/gpio/export
echo "out" > /sys/class/gpio/gpio23/direction
echo 24 > /sys/class/gpio/export
echo out > /sys/class/gpio/gpio24/direction
echo 17 > /sys/class/gpio/export
echo "out" > /sys/class/gpio/gpio17/direction
echo 27 > /sys/class/gpio/export
echo "out" > /sys/class/gpio/gpio27/direction
echo "21" > /sys/class/gpio/export
echo "in" > /sys/class/gpio/gpio21/direction
chmod 777  /sys/class/gpio/gpio15/value
chmod 777  /sys/class/gpio/gpio23/value
chmod 777  /sys/class/gpio/gpio24/value
chmod 777  /sys/class/gpio/gpio17/value
chmod 777  /sys/class/gpio/gpio27/value
chmod 777  /sys/class/gpio/gpio21/value
