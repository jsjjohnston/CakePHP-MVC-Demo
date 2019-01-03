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
