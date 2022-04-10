FROM nginx:1.18

COPY ./nginx/default.conf /etc/nginx/conf.d/

# node command
COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /opt /opt

WORKDIR /var/www/html
