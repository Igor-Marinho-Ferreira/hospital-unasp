<?php

namespace src\core;

use Exception;
use League\Plates\Engine;

class Response
{

    public static $isString;
    public static $redirect;


    /**
     * This method is responsible for configuring the isString variable with JSON
     * 
     * @param array|object Content that will be converted to JSON
     * @return self
     */
    public static function json(array|object $data, int $statusCode): self
    {
        http_response_code($statusCode);
        self::$isString = response_json($data);
        return new static;
    }


    /**
     * This method is responsible for performing the URI REDIRECT
     * 
     * @param string $uri
     * @return void;
     */
    public static function redirect(string $uri, $messageProperties = []): void
    {
        if (!empty($messageProperties))
            notiflixNotify($messageProperties["message"], $messageProperties["type"]);
        redirect(route($uri));
    }


    /**
     * Returns to the previous page showing error message
     * @param string $message
     * @return self
     */
    public static function backError(string $message): self
    {
        self::back([
            "message" => $message,
            "type" => MESSAGE_ERROR
        ]);
        return new static;
    }


     /**
     * Returns to the previous page showing success message
     * @param string $message
     * @return self
     */
    public static function backSuccess(string $message): self
    {
        self::back([
            "message" => $message,
            "type" => MESSAGE_SUCCESS
        ]);
        return new static;
    }


    /**
     * Method responsible for setting up the settings for the Return URL
     * 
     * @return self
     */
    public static function back(array $messageProperties = [], array $setOld = []): self
    {
        if (!empty($messageProperties))
            notiflixNotify($messageProperties["message"], $messageProperties["type"]);

        if (!empty($setOld))
            setSession($setOld["key"], $setOld["value"], 1);

        self::$isString = false;
        self::$redirect = url_back();
        return new static;
    }

    /**
     * This method rendering a view
     *
     * @param string $view path into directory view
     * @param array $data this array represents the data that will access in view
     * @return self
     */
    public static function viewRender(string $view, array $data = []): self
    {

        $viewPath = "./src/views/{$view}.php";
        if (!file_exists($viewPath))
            throw new Exception("A view ({$view}) não existe");


        $templates = new Engine('./src/views');

        // $templates->addData([]);
        self::$isString = $templates->render(
            $view,
            $data
        );

        return new static;
    }
}
