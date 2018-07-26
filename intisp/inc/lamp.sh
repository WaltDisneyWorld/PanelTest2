#!/bin/bash
echo "Installing Linux Apache, PHP, and MySQL for IntISP"
echo "We are currently finding the best method to install for your computer.."
echo "This may take a while, Please do not turn off your computer and please be"
echo "Patient..."
echo "If you see any errors please ignore them as they are completely normal."
check () {
   if [ -n "$(command -v "$1")" ]; then
echo "The installation has completed."
exit 0
else
echo "Install Not Detected"
fi
}
method() {
check php
sudo apt-get install apache2 libapache2-mod-php mariadb-server php php-cli php-fpm php-json php-mysql php-curl php-mail php-zip unzip zip -y -qq --force-yes
check php
sudo apt-get install apache2 libapache2-mod-php* mariadb-server php php*-cli php*-fpm php*-json php*-mysql php*-curl php*-mail php*-zip unzip zip -y -qq --force-yes
check php
}
methoddos() {
sudo apt-get install apache2 libapache2-mod-php7.2 mariadb-server php7.2 php7-cli php7.2-fpm php7.2-json php7.2-mysql php7.2-curl php7.2-mail php7.2-zip unzip zip -y --force-yes
check php
sudo apt-get install apache2 libapache2-mod-php7 mariadb-server php7 php7-cli php7-fpm php7-json php7-mysql php7-curl php7-mail php7-zip unzip zip -y  --force-yes
check php
sudo apt-get install apache2 libapache2-mod-php5 mariadb-server php5 php5-cli php5-fpm php5-json php5-mysql php5-curl php5-mail php5-zip unzip zip -y --force-yes
check php
}
method
methoddos
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
method
methoddos
$(sudo apt-get install apache2 php* -y -qq --force-yes)
check php
echo "Cannot Install APACHE/PHP/OR MYSQL"
exit 72

