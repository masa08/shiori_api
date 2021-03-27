# referance: https://qiita.com/igayamaguchi/items/aec8f2b15b203946a2c4
FROM php:7.3-fpm-buster

ENV COMPOSER_ALLOW_SUPERUSER 1

# About zip installation
RUN apt-get update \
  && apt-get install -y libzip-dev \
  && apt-get install -y zlib1g-dev \
  && docker-php-ext-install zip

# About composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
  && php composer-setup.php \
  && php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

# About laravel
RUN composer global require "laravel/installer"

# About pdo
RUN apt-get update \
  && apt-get install -y libpq-dev \
  && docker-php-ext-install pdo_mysql pdo_pgsql