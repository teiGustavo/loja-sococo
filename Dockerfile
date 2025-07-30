FROM wordpress:latest

WORKDIR /var/www

RUN chown -R www-data:www-data ./html \
    && chmod -R 775 ./html