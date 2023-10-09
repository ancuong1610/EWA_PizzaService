# This dockerfile builds the image for the lab of EWA at Hochschule Darmstadt

# Choose whether you need an image to debug (the image) or an image to deploy to docker hub!?
#ARG BUILDTYPE=debug
ARG BUILDTYPE=release

# Since there is no IF-Statement for the Dockerfile the image is build in
# different stages (debug or release) depending on the BUILDTYPE.
# See https://medium.com/@tonistiigi/advanced-multi-stage-build-patterns-6f741b852fae

# *********************************************************************************************
FROM php:8-apache AS ewa_base

RUN date

# Set locales
RUN apt-get update &&\
	apt-get install -y locales locales-all &&\
	locale-gen de_DE.UTF-8	
ENV LC_ALL de_DE.UTF-8 
ENV LANG de_DE.UTF-8 
ENV LANGUAGE de_DE.UTF-8
ENV CONFIG_UNICODE_USING_LOCALE=y

# install PHPunit etc.	
RUN apt-get update &&\
	apt-get install --no-install-recommends --assume-yes --quiet wget &&\
	cd /usr/local/bin &&\
	wget https://phar.phpunit.de/phpunit-9.phar &&\
	mv phpunit-9.phar /usr/local/bin/phpunit &&\
	chmod +x phpunit &&\
	./phpunit --version

# install PHP_CodeSniffer	
RUN cd /usr/local/bin &&\
	wget -O phpcs.phar https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar &&\
	mv phpcs.phar /usr/local/bin/phpcs &&\
	chmod +x phpcs

# install PHP_CodeBeautyfier	
RUN cd /usr/local/bin &&\
	wget https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar &&\
	mv phpcbf.phar /usr/local/bin/phpcbf &&\
	chmod +x phpcbf

# install PHPDocumentor	
RUN cd /usr/local/bin &&\
	wget http://www.phpdoc.org/phpDocumentor.phar &&\
	mv phpDocumentor.phar /usr/local/bin/phpdoc &&\
	chmod +x phpdoc

# install Doxygen
RUN apt-get update &&\	
	apt-get install -y doxygen graphviz

# Use the default production configuration
#RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini-production_"
#RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# or Use default development configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Install xdebug extension
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install DB layer mysqli
#RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-install mysqli

# Copy xdebug configuration for remote debugging
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

#Activate Export of environment variables (for demo)
RUN echo 'variables_order = "EGPCS"' >> $PHP_INI_DIR/php.ini

#Include special settings for EWA
COPY ./httpd-ewa.conf $APACHE_CONFDIR/conf-enabled

#Create tmp dir for demos etc.
RUN mkdir /tmp/generated &&\
	chmod a=rwx /tmp/generated &&\
	chmod a=rwx /usr/local/bin &&\
	chmod a=rwx /usr/local/bin/phpunit

# Cleaning...
RUN \
	apt-get autoremove -y && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# *************************** Specials for debugging the image ************************
# These commands are only included for the debug image
FROM ewa_base AS ewa_base_debug

RUN apt-get update &&\
	apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\
    apt-get install --no-install-recommends --assume-yes --quiet sudo &&\
    apt-get install --no-install-recommends --assume-yes --quiet vim > /dev/null &&\
    apt-get install --no-install-recommends --assume-yes --quiet iputils-ping&&\
	apt-get install -y dos2unix && \
    apt-get autoremove -y && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
	
#Set a color scheme for the vim-editor (in the container)
COPY ./vimrc.txt /root/.vimrc
	
# Sometimes permission problems occur when writing cache files
# Problem occurs when running docker on linux because of missing permissions 
# of the php user www-data
# For diagnosis interactively run commands in a console window as user www-data with 
# sudo -s -u www-data


# *************************** Specials for release image ******************************
# These commands are only included for the release image
FROM ewa_base AS ewa_base_release

LABEL version="1.0" \
	  description="Image used for the lab of the lecture EWA at Hochschule Darmstadt, Germany" \
	  maintainer="https://www.fbi.h-da.de/personen/ralf-hahn/"

# *************************************************************************************
# Choose the desired image depending on the BUILDTYPE
FROM ewa_base_${BUILDTYPE} AS php-apache

FROM php-apache 
# ********** "Done!" ****************
# Do not forget to tag the image before uploading to dockerhub
# docker tag docker_php-apache rahada/ewa:ss21