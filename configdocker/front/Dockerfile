FROM node:alpine
WORKDIR "/var/www/app/front"

# Copy existing application directory contents
COPY ../../front /var/www/app/front

RUN npm install
RUN npm i npm@latest -g
RUN npm install -g @angular/cli

#production
#RUN npm ci --only=productio

EXPOSE 4200

CMD ng serve --host 0.0.0.0
#RUN npm run serve