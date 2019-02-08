# Bank Transaction

### Prerequisites
  - Composer
  - Mysql
  - XAMPP or Valet



## Installation guide

### Setting up database
  Create a database named **bank_api**. Once you created the database checkout with your terminal to the folder bank-api and run this command

`composer install`

Once installation is finished, run the following command

`php artisan migrate`

Once migration is finished run the following command
`php artisan passport:client --personal`

### With Valet
  If you have an linux operating system use this [guide](https://laravel.com/docs/5.7/valet "guide") to install valet on your machine (use this one if you are using [Windows](https://github.com/cretueusebiu/valet-windows "Windows")), and simply run the application by the url
  http://bank-api.test/swagger to see api documentation
 
  
### With XAMPP
  Simply move the bank-api folder on your htdocs folder and then run the following command 
  
  `php artisan serve`
  
  you can access it via http://localhost/bank-api/swagger to see API documentation
  
##   Usage
  Please once you set up the application read swagger documentation how to use this api under http://bank-api.test/swagger OR http://localhost/bank-api/swagger
  
  Also under the folder /postman you have an exported folder of postman where you can find saved endpoints for this API
