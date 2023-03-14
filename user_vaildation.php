<?php

class Vaildator
{
    private $data;
    private $errors = [];
    public static $fields = ['username', 'email', 'password', 'confirmPassword'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function formValidation()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present");
                return;
            }
        }

        $this->usernameValidation();
        $this->emailValidation();
        $this->passValidation();
        $this->confirmPassValidation();
        $this->passwordMatch();
        return $this->errors;
    }

    private function usernameValidation()
    {
        $val = strtolower(trim($this->data['username']));
        if (empty($val)) {
            $this->addErrors('username', 'Provide Your Username');
        }
        // else {
        //     if (!preg_match("/^[a-zA-Z0-9]{6-12}$/", $val)) {
        //         $this->addErrors('username', "Username must contain Chars and Alphanumeric");
        //     }
        // }
    }

    private function emailValidation()
    {
        $val = strtolower(trim($this->data['email']));
        if (empty($val)) {
            $this->addErrors('email', 'Please Provide your Email');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addErrors('email', 'Provide A valid Email please');
            }
        }
    }

    private function passValidation()
    {
        $val = $this->data['password'];
        if (empty($val)) {
            $this->addErrors('password', 'Provide Password Please');
        } else {
            if ($val < 6) {
                $this->addErrors('password', 'password Lenght Must be greater than 6');
            }
        }
    }

    private function confirmPassValidation()
    {
        $val = $this->data['confirmPassword'];
        if (empty($val)) {
            $this->addErrors('confirmPassword', 'Confirm Your Password Please');
        } else {
            if ($val < 6) {
                $this->addErrors('confirmPassword', 'Password lenght must be greater than 6');
            }
        }
    }

    private function passwordMatch()
    {
        $passwordValue = $this->data['password'];
        $confirmPasswordValue = $this->data['confirmPassword'];

        if ($passwordValue !== $confirmPasswordValue) {
            $this->addErrors('password', 'Passwords do not Match');
            $this->addErrors('confirmPassword', 'Passwords do not Match');
        }
    }

    private function addErrors($key, $content)
    {
        $this->errors[$key] = $content;
    }
}
