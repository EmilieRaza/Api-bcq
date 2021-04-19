# BCQ API

This project is a basic User Register, Login/Logout, crud bill app using Docker environment, NoSql database with MongoDB and Symfony.
Please run following steps :

## Clone the project

``` 
$ git clone https://github.com/EmilieRaza/Api-bcq
```

## Install Environment
Choose between nginx environment or apache. Nginx is configured by default, but you can use Apache. Comment nginx image in docker-compose.yml and uncomment Apache image.

``` 
$ cd docker_mongoDB_symfony_user_reg/
$ docker-compose up -d
```

## Configure MongoDB
``` 
$ docker exec -it mongodb bash

$ mongo

> db = db.getSiblingDB('admin')
db.auth('root', 'root')
db = db.getSiblingDB('symfony')

db.createUser({
  user: "symfony",
  pwd: "symfony",
  roles: [{role: "readWrite", db: "symfony"}]
});

> quit()
```
Replace username, dbname, password.

## Launch Symfony

``` 
$ cd mongoDB_symfony_user_reg_app_back/
$ docker exec -it mongoDB_symfony_user_reg_app_php bash
$ composer install
```
Add an .env.local in root App folder, and store your database server location with credentials, and the dbname:
``` 
MONGODB_URL=mongodb://username:password@localhost:27017/?authSource=admin
MONGODB_DB=dbname
```

## Test
Test bcq app using those routes :
``` 
http://localhost:8080/register
http://localhost:8080/login
http://localhost:8080/logout
```

