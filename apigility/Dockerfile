
# Use this dockerfile to run apigility.
#
# Start the server using docker-compose:
#
#   docker-compose build
#   docker-compose up
#
# You can install dependencies via the container:
#
#   docker-compose run apigility composer install
#
# You can manipulate dev mode from the container:
#
#   docker-compose run apigility composer development-enable
#   docker-compose run apigility composer development-disable
#   docker-compose run apigility composer development-status
#
# OR use plain old docker 
#
#   docker build -f Dockerfile-dev -t apigility .
#   docker run -it -p "8080:80" -v $PWD:/var/www apigility
#
FROM php:7.2-apache

RUN apt-get update \
 && apt-get install -y \
   git \
   zlib1g-dev \
   libmcrypt-dev \
   libmhash-dev \
   libicu-dev \
   g++ \
   libfreetype6-dev \
   libjpeg62-turbo-dev \
   libxml2-dev \
 && pecl install redis \
 && docker-php-ext-configure intl \
 && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
 && docker-php-ext-configure bcmath --enable-bcmath \
 && docker-php-ext-configure soap --enable-soap \
 && docker-php-ext-install zip pdo_mysql hash intl gd \
 && docker-php-ext-install bcmath soap \
 && docker-php-ext-enable redis hash bcmath \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
 && mv /var/www/html /var/www/public \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer \
 && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf


# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Copy php.ini into image
COPY php.ini.sample /usr/local/etc/php/php.ini

# Time Zone
RUN echo "date.timezone=UTC" > $PHP_INI_DIR/conf.d/date_timezone.ini

# Cria grupo 1001
RUN getent group 1000 || groupadd web -g 1000

# Cria usuario 1001
RUN getent passwd 1000 || adduser --uid 1000 --gid 1000 --disabled-password --gecos "" web

RUN usermod -a -G web www-data

ENV APACHE_RUN_GROUP=web

RUN echo 'TraceEnable off' >> /etc/apache2/apache2.conf

WORKDIR /var/www/

#
#chown -R web:web /var/www
#chown -R www-data:www-data /var/www/data
#chown -R www-data:www-data /