# Build Webister using make.sh file
# Build by Adaclare Technologies
# Install V3.0.0 Release
# LAMP installer and INTISP
everything:
	echo "Install using make.sh"
	cd intisp && bash make.sh
clean:
	mysql -uroot -p
	rm -rf /var/www/html
	rm -rf /var/webister
        
