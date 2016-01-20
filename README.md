# Internet-Server Programmierung (WS2015) #

## Installation ##

`$ composer install`

*Requires [composer](https://getcomposer.org/download/) to be installed.*

## Running Application ##

### Using Docker (recommended) ###

`$ docker-compose up -d`

*Requires [docker-compose](https://docs.docker.com/compose/install/) to be installed.*

Brings up a complete environment running Apache2 with PHP, a MySQL server including sample content data and phpMyAdmin.

Open <http://localhost:8080/> to view the application.

phpMyAdmin is available at <http://localhost:8081>.

Additionally, you can then access the MySQL client prompt directly by using: `$ bin/mysql-prompt`

To suspend the containers just run `$ docker-compose stop` and for starting them again `$ docker-compose start` or `$ docker-compose up`.


### Using build-in PHP Webserver and own MySQL server ###

*Requires PHP and MySQL Server to be installed.*

`$ bin/webserver # starts internal PHP Webserver`

Open <http://localhost:8080/> to view the application.

It's on you to provide a MySQL Server with a working database structure. Database credentials should be:  
User: `isp`  
Password: `isp`  
Database: `isp`

## Author ##

Tilo Baller  

## License ##

This project is licensed under the WTFPL License - see the LICENSE file for details.
