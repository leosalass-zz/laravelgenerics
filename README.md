# laravelgenerics
Laravel generic classes to make our work easier, this library was made in Laravel Framework 5.6  

## Install
composer require immersioninteractive/laravelgenerics

## USE

- In you controller / class include the Alias:   
use IIResponse;   

### Set error messagess   
- IIResponse::set_errors('My error #1');   
- IIResponse::set_errors('My error #2');   
- IIResponse::set_errors('My error #3');   
- IIResponse::set_errors('My error #4');   

### Set data   
- IIResponse::set_data(['saludo' => 'hola mundo'])   

### Set status codes   
options:   
'OK' => '200'   
'CREATED' => '201'   
'NON-AUTHORITATIVE INFORMATION' => '203'   
'NO CONTENT' => '204'   
'RESET CONTENT' => '204'   
'PARTIAL CONTENT' => '206'   
'MULTY STATUS' => '207'   
'ALLREADY REPORTED' => '208'   
'NOT MODIFIED' => '304'   
'BAD REQUEST' => '400'   
'UNAUTHORIZED' => '401'   
'FORBIDEN' => '403'   
'NOT FOUD' => '404'   
'METHOD NOT ALLOWED' => '405'   
'NOT ACCEPTABLE' => '406'   
'GONE' => '410'   
'IM A TEAPOT' => '418'   
'TO MANY REQUEST' => '429'   
'INTERNAL SERVER ERROR' => '500'   
'NOT IMPLEMENTED' => '501'   
'SERVICE UNAVAILABLE' => '503'   

For example, if you want to set a 200 status code:   
IIResponse::set_status_code('OK')   

### Response   
option 1:   
return IIResponse::response();   

option 2:   
return IIResponse::response(['saludo' => 'hola mundo'], 'OK');   
