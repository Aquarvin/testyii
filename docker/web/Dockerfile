FROM php:5.6-apache

ARG YII_VERSION=1.1.16

RUN echo "deb http://archive.debian.org/debian stretch main contrib non-free" > /etc/apt/sources.list \
 && echo "deb http://archive.debian.org/debian-security stretch/updates main" >> /etc/apt/sources.list \
 && echo "Acquire::Check-Valid-Until false;" > /etc/apt/apt.conf.d/99no-check-valid-until \
 && apt-get update \
 && apt-get install -y --allow-unauthenticated \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    unzip \
    curl \
    git \
 && docker-php-ext-configure gd \
        --with-freetype-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
 && docker-php-ext-install \
        gd \
        pdo \
        pdo_mysql \
        mysqli \
        mbstring \
        zip \
        curl \
        opcache \
 && a2enmod rewrite \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug-2.5.5 \
 && docker-php-ext-enable xdebug

COPY apache.conf /etc/apache2/sites-available/000-default.conf
COPY php.ini /usr/local/etc/php/conf.d/custom.ini
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN curl -fsSL "https://github.com/yiisoft/yii/releases/download/${YII_VERSION}/yii-${YII_VERSION}.bca042.tar.gz" \
        -o /tmp/yii.tar.gz \
 && mkdir -p /var/www/yii \
 && tar -xzf /tmp/yii.tar.gz -C /var/www/yii --strip-components=1 \
 && rm /tmp/yii.tar.gz

WORKDIR /var/www/html

EXPOSE 80
