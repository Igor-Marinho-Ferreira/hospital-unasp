<?php

namespace src\requests;

use src\core\Request;

abstract class BaseRequest
{

    protected $rules;

    /**
     * This method returns all inputs except the token
     * 
     * @return array
     */
    public function inputs(): array
    {
        return Request::excepts(["token"]);
    }

    /**
    * This method returns value for input
    * 
    * @return mixed
    */
    public function input(string $key): mixed
    {
        return Request::input($key);
    }


    /**
     * This method is responsible for returning the validation rules
     * 
     * @return array
     */
    public function rules(): array
    {
        return $this->rules;
    }

    /**
     * Method responsible for performing validation
     * 
     */
    public function execute()
    {
        if (!formValidate($this->rules())) {
            notiflixNotify("Whoops! Não foi possível prosseguir com a solicitação.", MESSAGE_ERROR);
            return redirect(url_back());
        }

        return [];
    }
}
