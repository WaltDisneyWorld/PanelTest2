curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
cd /var/www/html/interface/
sudo php /usr/local/bin/composer install
echo "The Installation for composer is complete. Please continue with the installation"
