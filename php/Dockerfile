FROM php:7.2-fpm
COPY php.ini /usr/local/etc/php/
RUN docker-php-ext-install pdo_mysql

# FROM centos
# MAINTAINER Gen Takahashi <hina0414takahashi@gmail.com>
# # RUN: buildするときに実行される
# # RUN echo "now building..."
# # CMD: runするときに実行される
# # CMD echo "now running..."
# # CMD ["echo", "now running..."]
# RUN yum install -y httpd
# ADD ./index.html /var/www/html/
# EXPOSE 80
# CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]

