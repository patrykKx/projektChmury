#ZASIEGNIETO ZE STRONY OFICJALNEGO OBRAZU PHP NA DOCKER HUB
#TWORZYMY PLIK DOCKERFILE W PROJEKCIE PHP
FROM php:7.4-cli
LABEL name="Patryk Kazmierak"
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./index.php"]
#DODAJEMY OBRAZ APACHE
FROM php:7.2-apache
COPY index.php /var/www/html/
