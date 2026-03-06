############################################
# STAGE 1 — BASE
############################################
FROM php:8.4-fpm-alpine AS base

ARG APP_ENV=local
ENV APP_ENV=${APP_ENV}

WORKDIR /app

# Dependências do sistema
RUN apk add --no-cache \
    bash \
    git \
    curl \
    zip \
    unzip \
    autoconf \
    g++ \
    make \
    libtool \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    zlib-dev \
    postgresql-dev \
    linux-headers \
    oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        mysqli \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        zip \
        mbstring

# Redis
RUN pecl install redis && docker-php-ext-enable redis

# Xdebug apenas no ambiente local
RUN if [ "$APP_ENV" = "local" ]; then \
        pecl install xdebug && docker-php-ext-enable xdebug ; \
    fi

# Config PHP
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory.ini \
    && echo "max_execution_time=300" > /usr/local/etc/php/conf.d/time.ini

# Composer oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


############################################
# STAGE 2 — DEPENDÊNCIAS
############################################
FROM base AS dependencies

COPY composer.json composer.lock ./

# IMPORTANTE: --no-scripts para não rodar artisan antes da hora
RUN if [ "$APP_ENV" = "local" ]; then \
        composer install --prefer-dist --no-interaction --no-progress --no-scripts; \
    else \
        composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction --no-progress --no-scripts; \
    fi

# Agora copiamos o restante do projeto (incluindo artisan)
COPY . .

# Agora sim pode gerar autoload otimizado
RUN composer dump-autoload --optimize


############################################
# STAGE 3 — FINAL
############################################
FROM base

COPY --from=dependencies /app /app

RUN chown -R www-data:www-data /app

EXPOSE 9000

CMD ["php-fpm"]