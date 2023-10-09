# EWA Docker Setup
You know about [Docker](https://www.docker.com) and Docker is running on your system? You do not want to mess up your system by installing a web server and all the fancy software you need for EWA?

In that case you can simply start several docker containers and you are all set for EWA.

If you succeed in starting the docker containers you will get:
- Several former examinations - the examination as pdf, the code and the executeable code 
- a nice way to play and deploy webpages with php, html, css etc. That is exactly what you need for the EWA lab.
- all demos from the lecture fully functional - just use the links in the pdf of the slides while running the containers

*Note: This setup is given to you as it is. Please feel free to fork and to modify it. If you do some improvements that might be of interest for others please create a merge request.

## Disclaimer
When running docker containers you should be aware that this might expose your computer to some threats. You do this on your own risk! I am not liable for any loss whether direct, indirect, incidental or consequential, arising out of use of this project.

## Install docker

Install the `docker` tools as explained here: https://docs.docker.com/engine/install/

For Linux install `docker-compose` separately: https://docs.docker.com/compose/install/

## Initial Setup

In the folder, where the `docker-compose.yml` file is located, edit the file called `env.txt` in order to assign a root password for your database as environment variable. In order to avoid pushing your password to the repo you may add `env.txt` to the local `.gitignore`.
Hint: The docker setup uses the ports 80, 3306 and 8085. Please make sure that these ports are not in use by any other software when starting the containers. 

## Start the Containers

Start your local docker containers in a console window with `docker-compose up -d`. 
After a while (and a lot of messages) you should have 3 containers running:
- php-apache: Containing Apache Webserver and PHP
- MariaDB: your database server for SQL
- PHPmyAdmin a web-based application to modify your database 

All files in the `src`-folder are linked into the apache-php container, so you can see your changes while developing in that folder. Furthermore this folder contains all examples and demos for the lecture. Everything is set up and deployed automatically.
Note the folder `src\Log` containing the log files of the docker containers (e.g. apache log)

## Test the Installation

Go to [http://localhost](http://localhost) to check the served code. After installation you will see the content of the file `index.php` from the src-folder. 

You can select a file by specifying a path starting from the src-folder to the file at the end of the URL (please be aware that the containers run on linux and linux is case sensitive).

## Stop the Containers
Call `docker-compose down` to stop the containers.

## Development

To connect to the running mariadb instance use the hostname `mariadb`.
Example for PHP:

```php
new MySQLi("mariadb", "your_user", "your_secureuserpw", "your_database");
```
For normal access to the database without serious permissions please always use the User `public` and the password `public` (That user is created automatically). For root access you have to use the credentials you have set in the `env.txt` or in the `docker-compose.yml` file. 

### PHPmyAdmin

To access `phpmyadmin` go to [http://localhost:8085/](http://localhost:8085/). For convenience there is a forward from [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

Use the credentials you have set in the `env.txt` file for login. The database will be stored persistently. But if you rebuild the database container your entries will be lost. So you should better export a modified database scheme into a sql-file. 
Hint: The files in the folder `Docker\mariadb.setup` are read when building the docker containers and imported into the database. So if you want to make persistent changes this is the place to go. The files will be imported in alphabetic order. To see changes you made in the files you have to rebuild the MariaDB-container. Be aware that any error in those files will crash the startup of your MariaDB-container! 

### Major Changes
If you have changed your `env.txt` or if you want to start from scratch you have to delete and recreate volumes. Be aware that your data base entries will be lost!
To do so stop the running containers `docker-compose down` and delete the images.

Note: The name of this image may vary depending on your installation. Please check your existing images with `docker images` and delete the images you do not need anymore.

### Misc
- There is a `Makefile` that includes several usefull shortcuts for handling docker. When you have `make`on your system (otherwise you may at least read the commands from the file) you may call the following commands: 
   - `make start` to start the containers (instead of `docker-compose up -d`)
   - `make stop` to stop the containers
   - `make console` to open a shell in the apache docker container (You better know what you are doing? Really!?)
   - `make build` to rebuild the containers including the database when you made changes to the database schema or to the docker setup
   - `make clean` to delete all containers (but not your src folder)

- If you encounter strange errors when trying to build the containers (`Release file ... is not valid yet (invalid for another 11min 42s)`) on Windows systems this may happen due to wrong time settings in the container after standby. The easiest fix is to reboot the computer.
- If the start of the container fails this may be due to ports that are already in use. The docker setup uses the ports 80, 3306 and 8085. Please make sure that these ports are not in use by any other software.
- You will find the Apache Logfiles in the folder `Log` of your src folder. So you can easily access the log from outside of the container.
- There are well known attacks on computers using docker and containers. So here are some basic recommendations for security
  - Please make sure that your firewall is always up and running.
  - Start the containers only when you need it.
  
# EWA using XAMPP & Co.
If you can not run docker you have to setup the environment for EWA yourself. You need the same setup that is used for the EWA-lab. You will find some hints on the installation in the section "Technische Hinweise" of the current EWA lab. 

  Enjoy
  Ralf Hahn, Feb 2022