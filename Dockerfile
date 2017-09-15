# Start with a 7.1 installation of php with apache2
FROM php:7.1-apache
WORKDIR /var/www

# Install required php extensions
RUN docker-php-ext-install -j$(nproc) mbstring pdo pdo_mysql

# Setup apache configuration
COPY docker/apache2.conf /etc/apache2/apache2.conf
COPY docker/000-books.conf /etc/apache2/sites-available/000-books.conf
RUN rm /etc/apache2/sites-enabled/000-default.conf
RUN ln -s /etc/apache2/sites-available/000-books.conf /etc/apache2/sites-enabled/000-books.conf

# Enable mod_rewrite
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load

# Enable headers
RUN ln -s /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/headers.load

EXPOSE 80

# Add application code
COPY ./ /var/www/

# Set Permissions
RUN chgrp -R www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 0775 /var/www/storage /var/www/bootstrap/cache

# Cleanup
RUN rm -rf /var/www/{docker,Dockerfile,html}

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
