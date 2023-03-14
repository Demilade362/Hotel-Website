<?php

class loginValidation
{
    private $logindata;
    private $errors = [];
    public static $fields = ['email', 'password'];

    public function __construct($login_data)
    {
        $this->logindata = $login_data;
    }

    public function loginValid()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->logindata)) {
                trigger_error("$field is Missing");
                return;
            }
        }

        $this->emailValid();
        $this->passCodeValid();
        return $this->errors;
    }

    private function emailValid()
    {
        $value = strtolower(trim($this->logindata['email']));
        if (empty($value)) {
            $this->getErrors('email', 'Please Provide Email');
        }
    }

    private function passCodeValid()
    {
        $value = strtolower(trim($this->logindata['password']));
        if (empty($value)) {
            $this->getErrors('password', 'Please Provide Password');
        }
    }


    private function getErrors($key, $content)
    {
        $this->errors[$key] = $content;
    }
}
