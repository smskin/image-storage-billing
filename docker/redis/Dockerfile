FROM redis:latest

ARG TZ=Europe/Moscow
RUN echo "Define variable TZ. New value: ${TZ}";

RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone

COPY ./conf/redis.conf /etc/redis.conf

#####################################
#  Clean up APT:
#####################################
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
