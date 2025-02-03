# Gunakan image PHP dengan Apache
FROM php:8.1-apache

# Install ekstensi yang dibutuhkan (misalnya MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Salin semua file proyek ke dalam container
COPY . /var/www/html/

# Beri izin ke direktori
RUN chown -R www-data:www-data /var/www/html

# Buka port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
