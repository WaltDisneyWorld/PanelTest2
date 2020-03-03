FROM ubuntu:18.04

RUN apt-get update
RUN apt-get install software-properties-common -y
RUN add-apt-repository ppa:ondrej/php -y
RUN apt-get update

# Install apache, PHP, and supplimentary programs. curl is for debugging the container.
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 mysql-server libapache2-mod-php7.3 php7.3-common php7.3-cli php7.3-mbstring php7.3-mysql php7.3-int php7.3-gd php7.3-json php-pear php-apcu php7.3-curl curl supervisor vim

# Enable apache mods.
RUN a2enmod php7.3
RUN a2enmod rewrite

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid


ARG SEED=true
# Export port 80
EXPOSE 80
EXPOSE 443

# add source to image
RUN mkdir -p var/www/intisp
COPY ./panel var/www/intisp


# Update the default apache site with the config we created.
ADD docker-build-files/apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# Update the default apache ports with the config we created.
ADD docker-build-files/ports.conf /etc/apache2/ports.conf
