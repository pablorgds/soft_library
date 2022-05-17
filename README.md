# Project setup

## The first time
Follow this instruction to run the project fot the first time
##### 1 - Go to front
```
cd bleepchat/front
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

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).
