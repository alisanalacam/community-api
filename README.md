##PHPIST Community API Project

###Installation

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

You also need to install all the necessary dependencies with following command:

    php composer.phar install

####Setting up permissions

`app/cache` and `app/logs` directories must be writable both by the web server 
and the command line user using `chmod +a` or `setfacl` command. For detailed 
instructions see [Configuration and Setup](http://symfony.com/doc/current/book/installation.html#configuration-and-setup) 
chapter in Symfony2 documentation.