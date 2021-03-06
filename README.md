## Laravel Technical Task. Alex Klimenko

## Disclaimer


The following functionality has not been implemented:
* User registration or feedback process (forms, database, etc). Only event firing.
* Front-end for email templates management. 

## Entities description

* `Notification module` - the part of the application that is responsible for user notifications. In real life, just email notification is not sufficient enough. A user could be notified by different channels - email, mobile push, browser push, etc. The notification module should encapsulate notification logic, so module consists of notification processors, that listens to specific events in the system and an event router that is implemented using standard Laravel pub/sub.

* `Notification processor` - queued listener that subscribes to a specific event and runs business logic (sending email, for instance)

* `App\Modules\Notifications\EventServiceProvider` - a service provider that binds notification processors to events. 
We use a separate EventServiceProvider in order to encapsulate notification routing logic. 
If we use standard application EventServiceProvider, changing routing in the main application
could affect logic in module.

* `Template providers` - entities that provide template strings for notifications.

* `App\Modules\Notifications\Email\TemplateProviders\DatabaseTemplateProviderProvider` - template provider that looks for templates in the database.

## Configs

* All application configs could be found in  `env-dev.yml`

* You should change Mailgun config. Provided test account works only for one email hard coded into the config.


## Instructions

To run the application do the following:

* `docker-compose -f docker-build.yml up`
* `docker-compose up`

And while the application is running run in a separate console:

* `docker-compose run php-fpm php artisan migrate`

To run the application in the background run:

* `docker-compose up -d`

To test the events firing to go `http://127.0.0.1:8000/`. A feedback email view is stored id database. 
Other email views are just standard blade views.
