<?php declare(strict_types=1);

namespace Src\Http;

class Request 
{    
    /**
     * Method getRequestBody
     * 
     * Returns The Current Request Body
     *
     * @return array
     */
    public static function getRequestBody() : array 
    {
        return $_REQUEST;
    }    
    /**
     * Method getRequestUrl
     * 
     * Returns the current request URL
     *
     * @return string
     */
    public static function getRequestUrl() : string 
    {
        return filter_var($_SERVER["REQUEST_URI"],FILTER_SANITIZE_URL);
    }    
    /**
     * Method getRequestMethod
     *
     * Returns the current request Method
     * 
     * @return string
     */
    public static function getRequestMethod() : string 
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}