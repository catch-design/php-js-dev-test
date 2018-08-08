FROM node:8.2

RUN apt-get install -y git
# copy 

COPY server.crt /etc/ssl/server.crt
COPY server.key /etc/ssl/server.key

EXPOSE 2083 443 80