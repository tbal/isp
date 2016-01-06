# Internet-Server Programmierung (WS2015) #

## Installation ##

This Project uses PSR-4 class autoloading provided by composer. Therefore you need to run:

`$ composer install`

*Requires [composer](https://getcomposer.org/download/) to be installed.*

## Running Application ##

### Using Docker (recommended) ###

*Requires [docker-compose](https://docs.docker.com/compose/install/) to be installed.*

`$ docker-compose up`

Brings up one container running Apache2 with PHP and another one running a MySQL server and links both together.
You can then access the MySQL client prompt by using: `$ bin/mysql-prompt`

Open <http://localhost:8080/> to view the application.

To suspend the containers just run `$ docker-compose stop` and for starting them again `$ docker-compose start`


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
