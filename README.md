CFlash for Anax-MVC
=========================

With CFlash you can customize your own flash messages easy. With five pre defined flash message types it is very easy to install. You can also create your own personal ones.    

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/naess91/CFlashTest/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/naess91/CFlashTest/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/naess91/CFlashTest/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/naess91/CFlashTest/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/naess91/CFlashTest/badges/build.png?b=master)](https://scrutinizer-ci.com/g/naess91/CFlashTest/build-status/master)

License
-------

This software is free software and carries a MIT license..

Installation
-------------------------
To install with Composer and Packagist:  
`"ernb14/cflash": "dev-master"`

How to use flash messages
-------------------------

Firs you need to add this shared service in to your page controller.

`$di->setShared('flash', function() use ($di) { 
    $flashmessage = new \CFlash\CFlash\CFlash(); 
    $flashmessage->setDI($di); 
    return $flashmessage; 
});`

Then you need to copy the images and css file in to your img and css paths. So you need to go to your theme root path like this:  
`cd your-theme`  
`cp vendor/ernb14/CFlash/src/CFlash/css/CFlash.css webroot/css`  
`cp -r vendor/ernb14/CFlash/src/CFlash/img/flash webroot/img`  

Now you only have to put this out in a route: 
Example message `$app->flash->CustomMessage('Godkänt', 'success'); ` and to display the message use `$messages = $app->flash->displayFlashMessages();` and `$app->views->addString($messages);`  to retrive the messages.

Pre defined messages
-------------------------
This class includes five pre defined messages. And those are 'error', 'success', 'info', 'warning', 'notice'. Here is and example of how you can use one: `$app->flash->CustomMessage('Felmeddelenade', 'error');`   

To create a new message you can do this `$app->flash->CustomMessage('Your message', 'message type');` which the type defines the css class that you can modify.
	