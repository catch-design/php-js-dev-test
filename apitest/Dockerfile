# This will create an image for frisby API tests.

FROM node
MAINTAINER Robert Higgins <robert.h.higgins@gmail.com>

RUN npm install -g frisby
RUN npm install -g jasmine-node

WORKDIR /opt/frisby/

ENV NODE_PATH /usr/local/lib/node_modules/

ADD src/ /opt/frisby/api_tests

CMD jasmine-node \
    --config CUSTOMERAPI_PORT_80_TCP_ADDR $CUSTOMERAPI_PORT_80_TCP_ADDR \
    --config CUSTOMERAPI_PORT_80_TCP_PORT $CUSTOMERAPI_PORT_80_TCP_PORT \
    api_tests
