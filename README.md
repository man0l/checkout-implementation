# setup and run project
1) run `composer install`
2) run tests `vendor/bin/phpunit .\tests\CalculatorTest.php`
3) run app: `php index.php ZA,YB,FC,GD,ZA,YB,ZA,ZA`
4) run web server: `php -S localhost:8080 index.php`
5) navigate to http://localhost:8080/?products=ZA,YB,FC,GD,ZA,YB,ZA,ZA to see the result
