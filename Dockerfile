FROM php:8.0-apache 
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN a2enmod rewrite
RUN service apache2 restart
ADD ./www /var/www
RUN rm -f /etc/apache2/sites-available/000-default.conf
ADD ./settings/000-default.conf /etc/apache2/sites-available