# Project setup

## The first time
Follow this instruction to run the project fot the first time
##### 1 - Go to front
```
cd  library_soft/front
npm install
```

##### 2 - Now everything is ready to build the enviroment with Docker
```
//just the first time (build all images) 
docker compose up -d --build

//not building
docker compose up -d

//to stop all
docker compose stop
```

- URL Back http://localhost:8000
- URL front http://localhost

##### to run commands inside the container without opening the container
```
docker compose exec app composer install (composer to the back laravel/php)
docker compose exec front npm install (npm to the front angular)
```
### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).
