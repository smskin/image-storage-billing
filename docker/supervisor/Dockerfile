ARG COMPOSE_PROJECT_NAME
FROM ${COMPOSE_PROJECT_NAME}_console:latest

ARG COMPOSE_PROJECT_NAME
RUN echo "Service based on image: ${COMPOSE_PROJECT_NAME}_console:latest";

RUN apt-get update && apt-get install -y \
        supervisor

COPY conf/supervisor /etc/supervisor

#####################################
#  Clean up APT:
#####################################
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ENTRYPOINT ["supervisord", "--nodaemon", "--configuration", "/etc/supervisor/supervisord.conf"]
