FROM phpdockerio/php:8.1-fpm
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y install \
        git \
        php8.1-bz2 \
        php8.1-gd \
        php8.1-gmagick \
        php8.1-gmp \
        php8.1-http \
        php8.1-imagick \
        php8.1-memcached \
        php8.1-mysql \
        php8.1-pspell \
        php8.1-redis \
        php8.1-xdebug \
        php8.1-xmlrpc \
        php8.1-xsl; \
    apt-get clean; \
    apt-get update; \
    apt-get -y install php8.1-mysql; \
    apt-get -y install php8.1-gd; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
