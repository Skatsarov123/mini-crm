
FROM php:8.2-fpm
ARG WWWUSER=1000
ARG WWWGROUP=1000
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libonig-dev \
    curl supervisor redis-tools \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo pdo_mysql mbstring zip gd bcmath
RUN groupadd -g $WWWGROUP sail || true \
    && id -u sail &>/dev/null || useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u $WWWUSER sail
RUN chown -R $WWWUSER:$WWWGROUP /var/www/html
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
EXPOSE 9000
CMD ["php-fpm"]
