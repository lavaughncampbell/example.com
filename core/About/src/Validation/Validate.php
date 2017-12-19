<?php
NAMESPACE About\Validation;

class Validate {

    //Configuration
    public $validation = [];

    //Holds any errors
    public $errors = [];

    //Holds the $_POST data
    public $data = [];

    //returns true if $value is not empty
    public function notEmpty($value) {
        if(!empty($value)) {
            return true;
        }

        return false;
    }

    //Returns true if an email is valid
    public function email($value) {

        if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    //Processes post data
    public function check($data) {
        $this->data = $data;

        foreach(array_keys($this->validation) as $fieldName){
            $this->rules($fieldName);
        }

    }

    //Executes all of the rules for a given submit
    public function rules($field){
        foreach($this->validation[$field] as $rule){
            if($this->{$rule['rule']}($this->data[$field]) === false){
                $this->errors[$field] = $rule;
            }
        }
    }

    //Displays an error message to user
    public function error($field){
        if(!empty($this->errors[$field])){
            return $this->errors[$field]['message'];
        }

        return false;
    }

    public function userInput() {
      return false;
    }
}
