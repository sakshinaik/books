# Docker Usage Instructions

## Before Building
Before building the container, it's important to make sure that all your package managers have been executed, composer, npm, bower, etc.  It's also important to setup the .env file by moving the /books/.env.example file to /books/.env and ensuring all relevent variables are set.  Don't forget to set your application key.  You can use the following command to do this automatically...
```
php artisan key:generate
```

Build Instructions
```
cd /path/to/project/books
docker build -t books-container .
```

Run Examples
```
# Runs container with static code base, not for development
docker run -d -P books-container

# Allows you to specify the port forwarding for the container
docker run -d -p 80:80 books-container

# Allows you to mount a volume into the docker container, for development
# Windows...
docker run -d -P -v C:\Users\Tim\Projects\github.com\TKerstiens\books:/var/www books-container

# Linux/OS X...
docker run -d -P -v /user/b.belcher/github.com/TKerstiens/books:/var/www books-container
```

Accessing the web server

```
$ docker ps
CONTAINER ID        IMAGE                COMMAND                  CREATED             STATUS              PORTS                                           NAMES
5cc8f8730e1e        books-container      "docker-php-entryp..."   3 seconds ago       Up 2 seconds        0.0.0.0:32775->80/tcp, 0.0.0.0:32774->443/tcp   gallant_archimedes
```
Visit localhost:32775 in this case to access the server.
