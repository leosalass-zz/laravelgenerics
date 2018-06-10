<?php

namespace Immersioninteractive\Laravelgenerics;

use App\Http\Controllers\Controller;

class IIResponse extends Controller
{
    /**
     * HTTP STATUS CODES (MERGE)
     */
    private static $status_codes = [];

    /**
     * HTTP SUCCESS STATUS CODES (MERGE)
     */
    private static $status_codes_success = [
        'OK' => '200',
        'CREATED' => '201',
        'NON-AUTHORITATIVE INFORMATION' => '203',
        'NO CONTENT' => '204',
        'RESET CONTENT' => '204',
        'PARTIAL CONTENT' => '206',
        'MULTY STATUS' => '207',
        'ALLREADY REPORTED' => '208',
    ];

    /**
     * HTTP REDIRECTION STATUS CODES (MERGE)
     */
    private static $status_codes_redirections = [
        'NOT MODIFIED' => '304',
    ];

    /**
     * HTTP CLIENT ERROR STATUS CODES (MERGE)
     */
    private static $status_codes_client_errors = [
        'BAD REQUEST' => '400',
        'UNAUTHORIZED' => '401',
        'FORBIDEN' => '403',
        'NOT FOUD' => '404',
        'METHOD NOT ALLOWED' => '405',
        'NOT ACCEPTABLE' => '406',
        'GONE' => '410',
        'IM A TEAPOT' => '418',
        'TO MANY REQUEST' => '429',
    ];

    /**
     * HTTP SERVER ERROR STATUS CODES (MERGE)
     */
    private static $status_codes_server_errors = [
        'INTERNAL SERVER ERROR' => '500',
        'NOT IMPLEMENTED' => '501',
        'SERVICE UNAVAILABLE' => '503',
    ];

    /**
     * Error messages for response
     *
     * @var array
     */
    private static $errors = [];

    /**
     * Status code
     *
     * @var string
     */
    private static $status_code = "";

    /**
     * Status code name
     *
     * @var string
     */
    private static $status_text = "";

    /**
     * data for response
     *
     * @var array
     */
    private static $data = [];

    /**
     * Instantiate a new IIResponseController instance.
     */
    public function __construct(){
        self::$status_codes = array_merge(
            self::$status_codes_success, 
            self::$status_codes_redirections, 
            self::$status_codes_client_errors, 
            self::$status_codes_server_errors);
    }

    /**
     * get_error_codes function
     *
     * @return void
     */
    private static function get_error_codes()
    {
        return self::$status_codes;
    }

    /**
     * set_errors function
     *
     * @param string $errors
     * @return void
     */
    public static function set_errors(string $errors)
    {
        self::$errors[] = $errors;
    }

    /**
     * Return true / false if the response has errors or not
     *
     * @return boolean
     */
    public static function has_errors()
    {
        if(self::$errors == null){
            return false;
        }
        
        return true;
    }

    /**
     * set_status_code function
     *
     * @param string $status_text
     * @return void
     */
    public static function set_status_code($status_text)
    {
        self::$status_code = self::$status_codes[$status_text];
        self::$status_text = $status_text;
    }

    /**
     * set_data function
     *
     * @param [type] $data
     * @return void
     */
    public static function set_data($data)
    {
        self::$data = $data;
    }


    /**
     * response
     *
     * @param [type] $data
     * @param [type] $status
     * @return void
     */
    public static function response($data = NULL, $status = NULL)
    {        
        if($data != NULL){
            self::$data = $data;
        }
        
        if ($status != NULL) {
            self::$status_code = self::$status_codes[$status];
        }        
        
        if(self::$errors != NULL){
            self::$data = self::$errors;
            if(in_array(self::$status_code, self::$status_codes_success) || self::$status_code == NULL){
                self::$status_code = 400;
            }
        }else{
            if(!in_array(self::$status_code, self::$status_codes_success) || self::$status_code == NULL){
                self::$status_code = 200;
            }
        }
        
        return response()->json(self::$data, self::$status_code);
    }
}