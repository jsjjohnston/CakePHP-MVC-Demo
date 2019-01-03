# Introduction 

# Requirements
* HTTP Server. For example: Apache. Having mod_rewrite is preferred, but by no means required.
* PHP 5.6.0 or greater (including PHP 7.2).
* mbstring PHP extension
* intl PHP extension
* simplexml PHP extension

>In both XAMPP and WAMP, the mbstring extension is working by default.
>In XAMPP, intl extension is included but you have to uncomment extension=php_intl.dll in php.ini and restart the server >through the XAMPP Control Panel.
>In WAMP, the intl extension is “activated” by default but not working. To make it work you have to go to php folder (by default) C:\wamp\bin\php\php{version}, copy all the files that looks like icu*.dll and paste them into the apache bin directory C:\wamp\bin\apache\apache{version}\bin. Then restart all services and it should be OK.

# Setup
1. Copy __\accla__ to you __www__ folder
2. In __\accla\sql__ run the __accla.sql__ script in your database environment. 
>For example though the myphp web interface

# Users
| Name  | Email           | Pass  | Role  |
| ----- | --------------- | ----- | ----- |
| Admin | admin@accla.com | admin | Admin |
| Tom   | tom@accla.com   | tom   | Author|
| Jack  | jack@accla.com  | jack  | Author|

>The login page should be available from the home page (http://127.0.0.1/accla) or directly (http://127.0.0.1/accla/users/login) and uses the Email Address and Password for the login criteria.

# Roles
| Type  | Description                                                                                       |
| :---: | ------------------------------------------------------------------------------------------------- |
| Admin | Has comeple full Access to everything in the site including adding, Editing, deleting Ingredients |
| Author| Can view others recipes but cannot modify or delete. Cannot add, edit or delete ingredients. Can Add Modify and delete Own recipes. |

# Log Files
By default all log files can be found in __\accla\logs__

| File      | Discription                                         |
| --------- | --------------------------------------------------  |
| debug.log | SQL database add edit remove delete and user logins |
| error.log | Failed user logins                                  |
| queries   | SQL queries                                         |

