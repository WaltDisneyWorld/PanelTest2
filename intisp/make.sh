#!/bin/bash
# IntISP Installation Script
version=9
intro () {

   echo  " _____       _   _____  _____ _____  "
   echo  "|_   _|     | | |_   _|/ ____|  __ \ "
   echo  "  | |  _ __ | |_  | | | (___ | |__) |"
   echo  "  | | | '_ \| __| | |  \___ \|  ___/ "
   echo  " _| |_| | | | |_ _| |_ ____) | | "
  echo   "|_____|_| |_|\__|_____|_____/|_| "

       echo "Copyright Adaclare Technologies 2007-2018 All Rights Reserved"
       echo "You are installing IntISP V$version on your computer."
       echo "NOTICE! YUM SYSTEMS MAY NOT BE FULLY COMPATIBLE WITH INTISP RIGHT NOW!!"
}
questions () {
    read -p "Do you agree to Adaclare Technologies Terms of Service and MIT Licences (Yy/Nn)? " -n 1 -r
if [[ $REPLY =~ ^[Yy]$ ]]
then
    echo
    else
    echo
    exit 7
fi
echo Requirements - IntISP $version
PS3="What type of package manager do you use? "
select option in apt-get yum
do
    case $option in
        apt-get)
            pkg=apt-get;
            break;;
        yum)
            pkg=yum;
            break;;
        quit)
            break;;
     esac
done
PS3="What Web Server would you like to use? "
select option in apache2-httpd nginx
do
    case $option in
        apache2-httpd)
            websrv=apache2;
            break;;
        nginx)
            websrv=nginx;
            break;;
        quit)
            break;;
     esac
done
PS3="What Database server would you like to use? "
select option in mysql mariadb
do
    case $option in
        mysql)
            db=mysql-server;
            break;;
        mariadb)
            db=mariadb-server;
            break;;
        quit)
            break;;
     esac
done
  read -p "Install IonCube Loader (Yy/Nn)? " -n 1 -r
if [[ $REPLY =~ ^[Yy]$ ]]
then
    ion=true
    else
    ion=false
fi
echo
echo -n "new MySQL root Password:"
read -s password
echo
echo "You will be installing $websrv , $db , php , and Ioncube (if selected) on a $pkg based server."
}
spinner()
{
    local pid=$!
    local delay=0.75
    local spinstr='|/-\'
    while [ "$(ps a | awk '{print $1}' | grep $pid)" ]; do
        local temp=${spinstr#?}
        printf " [%c]  " "$spinstr"
        local spinstr=$temp${spinstr%"$temp"}
        sleep $delay
        printf "\b\b\b\b\b\b"
    done
    printf "    \b\b\b\b"
}

setup() {
    mkdir -p /var/webister
    mkdir -p /var/webister/80
    cp -r system /var/www/html/interface
    chmod -R 777 /var/www/html
   git clone https://github.com/INTisp/IntISP-Daemon.git
   pip install --upgrade pip
   cd IntISP-Daemon && make pip && make build && make install
    if [ "$ion" = true ]; then
bash eng_ioncube.sh
 fi
intdaemon start
#cp inc/startftp.php /var/webister/
    #sudo pip install pyftpdlib
    #sudo cp inc/ftpserv.py /var/webister/
    #cp inc/service /etc/init.d/webister
    #chmod 777 /etc/init.d/webister
    #chmod +x /etc/init.d/webister
    #sudo cp inc/service.php /var/webister/
    #sudo cp inc/billingconnect.php /var/webister/
    sudo cp inc/virtualhost.sh /usr/local/bin/wvhost
    sudo chmod +x /usr/local/bin/wvhost
    echo 'apache ALL=NOPASSWD: ALL' | sudo EDITOR='tee -a' visudo
    wvhost admin.com 80
    mysql -uroot -e "CREATE DATABASE webister"
    mysqladmin -u root password '$password'
    chmod -R 777 /var/webister/
    service $websrv start
    service mysql start
}

finish () {

echo "Testing your system to make sure IntISP isnt broken..."
echo "1/3 System"
command -v php >/dev/null 2>&1 || { echo >&2 "I require php but it's not installed.  Aborting."; exit 1; }
echo "PHP     INSTALLED"
command -v mysql >/dev/null 2>&1 || { echo >&2 "I require mysql but it's not installed.  Aborting."; exit 1; }
echo "MYSQL     INSTALLED"
command -v a2ensite >/dev/null 2>&1 || { echo >&2 "I require apache but it's not installed.  Aborting."; exit 1; }
echo "APACHE     INSTALLED"
command -v python >/dev/null 2>&1 || { echo >&2 "I require python but it's not installed.  Aborting."; exit 1; }
echo "PYTHON     INSTALLED"
echo "2/3 Files"
if [ ! -f /var/www/html/interface/configdatabase.php ]; then
    echo "Database config not found!"
    else
    echo "DATABASE CONFIG     OK"
fi

if [ ! -f /var/www/html/interface/data/register ]; then
    echo "SERIAL # config not found!"
    else
    echo "SERIAL # CONFIG     OK"
fi
if [ ! -f /usr/local/bin/wvhost ]; then
    echo "WVHOST not found!"
    else
    echo "WVHOST     OK"
fi
echo "3/3 Daemon"
if lsof -Pi :8080 -sTCP:LISTEN -t >/dev/null ; then
    echo "WEBSERVER: RUNNING"
else
    echo "WEBSERVER: NOT RUNNING"
fi
echo "If everything is ok, intisp is running fine. The issue may be with the daemon. Please give our support this message if you have any issues."
echo -e "\nThe installation is now complete."
echo -e "###############################################################################"
echo "You cannot start using IntISP until The daemon is running"
echo "Please update /etc/intdaemon/config.ini"
echo "With the correct MySQL Details"
echo "Then run the installer"
echo "After you run the installer type intdaemon start"
echo "Your system has installed IntISP $version"
echo "The default username and password is admin"
echo "Visit the control panel http://localhost/interface."
echo -e "###############################################################################"

exit 0
}
check () {
   if [ -n "$(command -v "$1")" ]; then
echo "The installation has completed."
setup
finish
exit 0
else
echo "Install Not Detected"
fi
}
installreq() {
    echo "Installing Linux Apache, PHP, and MySQL for IntISP"
echo "We are currently finding the best method to install for your computer.."
echo "This may take a while, Please do not turn off your computer and please be"
echo "Patient..."
echo "If you see any errors please ignore them as they are completely normal."
    $pkg update
    $pkg install $db $websrv libapache2-mod-php curl python2.7 python-pip php php-cli php-fpm php-json php-mysql php-curl php-mail php-zip libmysqlclient-dev
    check php
    $pkg install $db $websrv libapache2-mod-php* curl python2.7 python-pip php php*-cli php*-fpm php*-json php*-mysql php*-curl php*-mail php*-zip libmysqlclient-dev
    check php
    $pkg install $db $websrv libapache2-mod-php7 curl python2.7 python-pip php7 php7-cli php7-fpm php7-json php7-mysql php7-curl php7-mail php7-zip libmysqlclient-dev
    echo "Cannot install PHP SQL Server or Web Server. Please try again or reinstall your Operating System."
    exit 1;
}
intro
questions
installreq
