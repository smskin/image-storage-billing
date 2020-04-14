FROM mariadb:latest

ARG TZ=Europe/Moscow
RUN echo "Define variable TZ. New value: ${TZ}";

RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone

COPY ./conf/mariadb/my.cnf /etc/mysql/my.cnf
COPY ./conf/mariadb/conf.d/docker.cnf /etc/mysql/conf.d/docker.cnf

#####################################
#  Clean up APT:
#####################################
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
