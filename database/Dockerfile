FROM postgres:9.3
MAINTAINER Robert Higgins <robert.h.higgins@gmail.com>

ADD schema/ /docker-entrypoint-initdb.d/
ADD data/ data/
ADD load_data load_data

VOLUME  ["/etc/postgresql", "/var/log/postgresql", "/var/lib/postgresql"]
