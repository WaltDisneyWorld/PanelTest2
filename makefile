# Build Webister using make.sh file
# Build by Adaclare Technologies
# Install V3.0.0 Release
# LAMP installer and INTISP
everything:
	# Installing Python and add-apt-repository
	sudo apt-get install curl python3 python3-pip software-properties-common -y
	# Adding PHP Repository
	sudo add-apt-repository ppa:ondrej/php
	# Updating Sources
	sudo apt-get update
	# Installing MariaDB and PHP 7.X
	sudo apt-get install mariadb-common mariadb-client mariadb-server php7.2 php7.2-cli php7.2-fpm php7.2-json php7.2-mysql php7.2-curl php7.2-mail -y 
	# Setting up MYSQL
	sudo service mysql start
	sudo mysql_secure_installation
	echo "Install using make.sh"
	cd intisp && bash make.sh
bypass:
	echo "Install using make.sh"
	cd intisp && bash make.sh