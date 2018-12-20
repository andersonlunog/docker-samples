FROM node:10
RUN getent passwd app || useradd --user-group --create-home --shell /bin/false app
ENV HOME=/home/app
COPY package.json $HOME/nodejs/
USER root
RUN chown -R app:app $HOME/*
USER app
WORKDIR $HOME/nodejs
RUN yarn
USER root
COPY . $HOME/nodejs
RUN chown -R app:app $HOME/*
USER app
EXPOSE 3000
CMD ["npm", "start"]