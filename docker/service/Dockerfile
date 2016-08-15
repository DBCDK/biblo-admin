FROM node:6.3

RUN git clone -b stable https://github.com/DBCDK/dbc-community-service.git /usr/src/app
WORKDIR /usr/src/app

RUN npm install

COPY run.sh run.sh
RUN chmod u+x run.sh

EXPOSE 3000

CMD ["./run.sh"]
