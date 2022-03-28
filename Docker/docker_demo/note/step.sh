# Các image cần thiết
docker pull httpd:2.4.53
docker pull php:8.1.4-fpm
docker pull mysql:8.0.28
docker pull phpmyadmin:5.1.3

# Tạo network chung cho app
docker network create --driver bridge www-net

# Tạo volume chứa code
docker volume create --opt device="$(pwd)"/code --opt type=none --opt o=bind v-code

############# MySQL Service
docker run -d --name c-mysql --network www-net -v "$(pwd)"/db:/var/lib/mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=1234 mysql:8.0.28

############ PHP My Admin
docker run --name c-pma --network www-net -d -e PMA_ARBITRARY=1 -p 8080:80 phpmyadmin:5.1.3

############# PHP Service
docker run -d --name c-php -h php -v v-code:/code --network www-net php:8.1.4-fpm
docker exec -it c-php /bin/bash -c "docker-php-ext-install mysqli && docker-php-ext-install pdo_mysql"
docker restart c-php

############## Apache Service
# Lấy file apache config ra
docker run --rm -v "$(pwd)"/configs:/app httpd:2.4.53 cp /usr/local/apache2/conf/httpd.conf /app

# Chỉnh sửa file config
# Enable module mod_proxy mod_proxy_fcgi, mod_rewrite.so
# Chỉnh RootDicrectory về /code
# Enable AllowOverride : None -> All
# DirectoryIndex thêm index.php
# AddHandler "proxy:fcgi://c-php:9000" .php

# Start apache
docker run --name c-httpd -h httpd -d -v v-code:/code -v "$(pwd)"/configs/httpd.conf:/usr/local/apache2/conf/httpd.conf --network www-net -p 80:80 -p 443:443 httpd:2.4.53