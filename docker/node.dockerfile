FROM node:current-alpine

# Install sh
RUN apk add --no-cache bash

WORKDIR /var/www/html/public