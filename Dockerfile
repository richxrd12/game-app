FROM mysql:latest

ENV MYSQL_ROOT_PASSWORD=1234

EXPOSE 3306

CMD ["mysqld"]