FROM php:8.2.1-apache

# install setcap
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install --no-install-recommends -yqq \
    libcap2-bin \
    && rm -rf /var/lib/apt/lists/*

# allow any user to bind port 80
RUN setcap cap_net_bind_service=+ep /usr/sbin/apache2

# install php extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

#install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "zip"]
RUN ["apt-get", "install", "-y", "unzip"]

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip