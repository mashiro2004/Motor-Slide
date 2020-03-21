#!/bin/bash

echo 15 > /sys/class/gpio/export
echo out > /sys/class/gpio/gpio15/direction
chmod 777  /sys/class/gpio/gpio15/value
