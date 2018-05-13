#!/bin/sh
#################################################
#
# The MIT License (MIT)
#
# Copyright (c) 2014-2015 Robert Nevanen
#
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
#
# he above copyright notice and this permission notice shall be included in
# all copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
# THE SOFTWARE.
#################################################
        if [ `whoami` != root ]; then
            echo Please run this script as root or using sudo
            exit
        fi
	if [ "$1" = "" ]; then
		echo "Example: wvhost foobar.org"
		exit
	else
	if [ ! -d /var/webister/$1 ]; then
        echo " == Creating www in /var/webister"
        mkdir /var/webister/$2/cgi-bin
		chmod 0700 /var/webister/$2
        chown -R www-data:www-data /var/webister/$2
        chmod -R 777 /var/webister/$2
	fi
if [ -n "$2" ]; then
alias="ServerAlias $1"
fi
echo "
<VirtualHost *:80>
       ServerAdmin admin@$1
       ServerName  testserv.adaclare.com
ServerAlias $1
            # Indexes + Directory Root.
       DirectoryIndex index.html index.php
       DocumentRoot /var/webister/$2
   <Directory "/var/webister/$2">
        # AllowOverride All      # Deprecated
        # Order Allow,Deny       # Deprecated
        # Allow from all         # Deprecated

        # --New way of doing it
        Require all granted
    </Directory>

</VirtualHost>
" > /etc/apache2/sites-available/$1.conf
a2ensite $1 >/dev/null 2>&1 &
/etc/init.d/apache2 restart >/dev/null 2>&1 &
fi
echo " == Added $1 succesfully! =="