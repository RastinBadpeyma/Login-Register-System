<?php

class ErrorMessage {
    protected $errors = [];

    public function set($name , $value)
    {
        $this->errors[$name][] = $value;
    }

    public function has($name)
    {
        return isset($this->errors[$name]);
    }

    public function count()
    {
        return count($this->errors);
    }

    public function first($name)
    {
        if( $this->has($name) )
            return $this->errors[$name][0];

        return null;
    }

}