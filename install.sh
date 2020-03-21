# Espande il filesystem
/usr/bin/rootfs-expand
# Setta l'hostname
hostnamectl set-hostname RASP
#disabilita il firewall
systemctl disable firewalld
systemctl stop firewalld
#disabilita selinux 
setenforce 0
sed -i 's/enforcing/disabled/g' /etc/selinux/config /etc/selinux/config
#scarica i vari repo
cat > /etc/yum.repos.d/epel.repo << EOF
[epel]
name=Epel rebuild for armhfp
baseurl=https://armv7.dev.centos.org/repodir/epel-pass-1/
enabled=1
gpgcheck=0
EOF

cat > /etc/yum.repos.d/php72-testing.repo << EOF
[php72-testing]
name=Remi php72 rebuild for armhfp
baseurl=https://armv7.dev.centos.org/repodir/community-php72-testing/
enabled=1
gpgcheck=0
EOF

cat > /etc/yum.repos.d/remi.repo << EOF
[remi]
name=Remi's RPM repository for Enterprise Linux 7 - $basearch
mirrorlist=http://cdn.remirepo.net/enterprise/7/remi/mirror
enabled=1
gpgcheck=1
gpgkey=https://rpms.remirepo.net/RPM-GPG-KEY-remi
EOF

# aggiorna i repo e scarica i pacchetti
yum repolist
yum install httpd php wget -y

#starta apache
systemctl enable httpd
systemctl start http

#Crea la directory e mette lo script da richiamare all'avvio dal servizio

wget https://raw.githubusercontent.com/mashiro2004/Motor-Slide/master/init.sh
mkdir /usr/bin/rasp
cp init.sh /usr/bin/rasp/

#scarica il servizio e lo copia nella directory dei servizi
wget https://raw.githubusercontent.com/mashiro2004/Motor-Slide/master/gpio.service
cp gpio.service /etc/systemd/system/

# Fa il reload del demone e fa partire il servizio e lo setta in avvio automatico

systemctl daemon-reload
systemctl start gpio.service
systemctl enable gpio.service

#Scarica la pagina php e la copia sotto la root dando i giusti permessi

wget https://raw.githubusercontent.com/mashiro2004/Motor-Slide/master/phptest.php
cp phptest.php /var/www/html/
chown apache:apache /var/www/html/phptest.php

yum update -y

#Riavvia il sistema
reboot