<?php declare(strict_types=1);

namespace Src\Http;

class Response 
{
    private string $contentBody;
    /**
     * Method setContentBody
     *
     * @param mixed $value [Set the Content'sBody]
     *
     * @return void
     */
    public function setContentBody(string $value) 
    {
        $this->contentBody = $value;
    }       
    /**
     * Method getContentBody
     *
     * @return string
     */
    public function getContentBody() : string 
    {
        return $this->contentBody;
    }
    /**
     * Method setHeader
     *
     * @param string $option [Header Option]
     * @param string $value [Header Value]
     *
     * @return void
     */
    public function setHeader(string $option, string $value)
    {
        header("$option: $value");
    }    
    /**
     * Method setStatusCode
     *
     * @param int $statusCode [Status Code]
     *
     * @return void
     */
    public function setStatusCode(int $statusCode)
    {
        http_response_code($statusCode);
    }
}