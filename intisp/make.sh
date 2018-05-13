VERSION=6
showLoading() {
  mypid=$!
  loadingText=$1

  echo -ne "$loadingText\r"

  
    echo -ne "$loadingText.\r"
    sleep 0.5
    echo -ne "$loadingText..\r"
    sleep 0.5
    echo -ne "$loadingText...\r"
    sleep 0.5
    echo -ne "\r\033[K"
    echo -ne "$loadingText\r"
    sleep 0.5


  echo "$loadingText... DONE"
}
direct() {
    BLAH=$(mkdir -p /var/webister)
BLAH=$(mkdir -p /var/webister/80)
BLAH=$(rm -rf /var/www/html)
BLAH=$(cp -r public /var/www/html)
BLAH=$(cp -r system /var/www/html/interface)
BLAH=$(chmod -R 777 /var/www/html)
    }
ftp() {
    BLAH=$(cp inc/startftp.php /var/webister/)
BLAH=$(sudo pip install pyftpdlib)
BLAH=$(sudo cp inc/ftpserv.py /var/webister/)
BLAH=$(cp inc/service /etc/init.d/webister)
BLAH=$(chmod -R 777 /etc/init.d/webister) 
    }
vhost() {
    BLAH=$(sudo cp inc/service.php /var/webister/)
BLAH=$(sudo cp inc/billingconnect.php /var/webister/)
BLAH=$(sudo cp inc/restore.sql /var/webister/)
BLAH=$(sudo cp -r inc/migrations /var/webister/)
BLAH=$(sudo cp inc/virtualhost.sh /usr/local/bin/wvhost)
BLAH=$(sudo chmod +x /usr/local/bin/wvhost)
BLAH=$(echo 'apache ALL=NOPASSWD: ALL' | sudo EDITOR='tee -a' visudo)
BLAH=$(wvhost admin.com 80)
BLAH=$(php inc/install.php $PASS)
BLAH=$(chmod -R 777 /var/webister/)
    }
services() {
    BLAH=$(/etc/init.d/webister)
BLAH=$(service apache2 start)
    }
endmsg() {
    
echo -e "\nThe installation is now complete."
echo -e "###############################################################################"

echo "Your system has installed IntISP $VERSION"
echo "The system has detected which has been installed (This may not be correct)"
check () {
   if [ -n "$(command -v "$1")" ]; then
echo -e "$1: OK"
else
echo -e "$1: Not Installed, you may have issues."
fi
}
check php
check mysql
check apache2
echo "The default username and password is admin"
echo "Visit the control panel http://localhost/interface."
echo -e "###############################################################################"
echo -e "###############################################################################"
exit 0
    }
echo "_______ _________        _______________ _______ ________ __________"
echo "___    |______  /______ ___  ____/___  / ___    |___  __  ___  ____/"
echo "__  /| |_  __  / _  __  /_  /     __  /  __  /| |__  /_/ /__  __/   "
echo "_  ___ |/ /_/ /  / /_/ / / /___   _  /____  ___ |_  _  _/ _  /___   "
echo "/_/  |_| __ _/    __ _/   ____/   /_____//_/  |_|/_/ |_|  /_____/   "

echo "You are installing adaclare intisp version $VERSION"
echo "

Licensed under the Adaclare Custom Licence; you may not use this file except in compliance with the License.

We follow these licences:
http://www.apache.org/licenses/LICENSE-2.0
https://opensource.org/licenses/MIT

Copyright (C) 2007 Adaclare Technologies <http://www.adaclare.com>
Everyone is permitted to use and distribute verbatim copies
of this license document, but changing it is not allowed.

IntISP/Webister is free software: you can redistribute it and/or modify
it under the terms of the Adaclare Custom Licence as published by
Adaclare Technologies. HOWEVER you are not allowed to distribute
our software AT ALL.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. IF ANYTHING BREAKS I AM NOT RESPONSIBLE FOR IT.


"
echo -n MySQL Password: 
read PASS
echo -n Hostname FQDN: 
read HOSTNET

result=`echo $HOSTNET | grep -P '(?=^.{1,254}$)(^(?>(?!\d+\.)[a-zA-Z0-9_\-]{1,63}\.?)+(?:[a-zA-Z]{2,})$)'`
if [[ -z "$result" ]]
then
    echo "$HOSTNET is NOT a FQDN"
    read
    clear
    bash make.sh nok
else
    echo "$HOSTNET is a FQDN"
    hostname $HOSTNET
fi
# Create Database


BLAH=$(mysql -u root -p"$PASS" -e "CREATE DATABASE webister;") & showLoading "Creating Database"
BLAH=$(service mysql start) & showLoading "Starting MySQL Server"

direct & showLoading "Copying Files"
ftp & showLoading "Setting Up FTP"
vhost & showLoading "Configuring VHOST"
services & showLoading "Starting Services"
endmsg