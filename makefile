# Build Webister using make.sh file
# Build by Adaclare Technologies
# Install V3.0.0 Release
# LAMP installer and INTISP
everything:
	# Installing Python and add-apt-repository
	sudo apt-get install curl python3 python-pip software-properties-common -y
	# Adding PHP Repository
	#sudo add-apt-repository ppa:ondrej/php broken fix later
	# Updating Sources
	sudo apt-get update
	# Installing MariaDB and PHP 7.X Apache2
	sudo apt-get install apache2 libapache2-mod-php mysql-server php php-cli php-fpm php-json php-mysql php-curl php-mail -y 
	# Setting up MYSQL
	sudo service mysql start
	sudo mysql_secure_installation
	echo "Install using make.sh"
	sudo sh eng_ioncube.sh
	cd intisp && bash make.sh
bypass:
	echo "Install using make.sh"
	cd intisp && bash make.sh
