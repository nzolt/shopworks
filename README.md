# Shopworks single manning minutes calculator

Composer based project, no framework
Language: PHP (min v7.3)
Libraries:
```
"require": {
  "php": "^7.3",
  "ext-curl": "*",
  "ext-json": "*"
},
"require-dev": {
  "phpunit/phpunit": "^9.3"
},
```

Code owner: Zoltan Nagy <nzolthu@gmail.com> 

### Acceptance Criteria:
- See in provided documents.

- Can be run in demo container, docker-compose.yml provided. 

### Start:

- user@host$ docker-compose -up [-d]
- user@host$ docker exec -ti app-lin bash
- root@app-shw$ cd /var/www/app/
- root@app-shw$ composer install (composer 2.*)
- root@app-shw$ php app.php (demo)
- root@app-shw$ php vendor/bin/phpunit --group [unit|ready]
__________________________________________________________________________________________
root@app-shw:/var/www/app# php ./vendor/bin/phpunit --group unit
PHPUnit 9.5.10 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.4.3
Configuration: /var/www/app/phpunit.xml
Random Seed:   1633440623
Warning:       No code coverage driver available

.........                                                           9 / 9 (100%)

Time: 00:00.031, Memory: 8.00 MB

OK (9 tests, 17 assertions)
__________________________________________________________________________________________

### The code:

Covers the provided 3 scenarios

The current code fulfilling the requirements for two employees in one day.

Didn't handle more than two employees in one day.

Returns an array of single and shared manning minutes by employee id from provided Rota. 

### TODO:

- Add shared manning calculation if required.
- If more than two employees are working one day, the calculation need to refactored. 
On that case neem to use a much more complex array walk logic as the start and ens of 
shifts need to compared from both directions.

##---------------------------------------------

