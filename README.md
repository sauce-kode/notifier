# Notifier
_A simple notification service that pushes notifications to subscriber endpoints when messages are published on their subscribed topics._

### Features Implemented
* Subscription to a topic
* Publishing to a topic
* Subscriber endpoints getting notifications of published topics

## Tools and Languages

* Laravel - Laravel is a PHP framework and was chosen because of the ease and speed of writing backend applications.
* Redis - Redis is an in-memory data structure, which is also used a database, cache and message broker. Redis was chosen because of its R/W speed.

## Setup and Installation

This project requires the following dependencies to run

* [PHP7+](https://www.php.net/downloads.php)
* [Composer](https://getcomposer.org/download/)
* [Redis](https://redis.io/download)

Clone the project, install the dependencies and dev dependencies.

```sh
git clone https://github.com/sauce-kode/notifier.git
cd notifier
composer install
```

Create .env file
```sh
cp .env.example .env
```

Start the publisher server (you can use any port of your choice, pass your desired port number after the --port=)

```sh
php artisan serve --port=8001
```

Start the subscriber(s) server(s) (you can use any port of your choice, pass your desired port number after the --port=). You can use serveral servers.

```sh
php artisan serve --port=8002
php artisan serve --port=8003
```

Start queue (Or depending on your OS, you can configure a supervisor)
```sh
php artisan queue:work
```

### Endpoints
A postman collection for the endpoints has been added 

[Notifier Collection](https://github.com/sauce-kode/notifier/blob/main/Notifier.postman_collection.json)

### Process flow diagram

### Topic Subscription

![Topic Subscription](https://github.com/sauce-kode/notifier/blob/main/subscription.jpg?raw=true)
