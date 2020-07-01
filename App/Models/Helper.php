<?php

namespace App\Models;

class Helper
{

    private array $data = [];
    private string $error = '';

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

        public function isEmpty()
        {
            if (empty($this->data)){
                $this->error = 'isEmpty';
            }
            return $this;
        }

        public function isPhone()
        {
            if (isset($this->data['phone']) && empty($this->data['phone']) && strpos($this->data['phone'], '+7') !== false){
                $this->error = 'isPhoneError';
            }
            return $this;
        }

        public function isName()
        {
            if (isset($this->data['name']) && empty($this->data['name']) && is_string($this->data['name'])){
                $this->error = 'isNameError';
            }
            return $this;
        }

    public function getData()
    {
        if (!empty($this->error)){
            throw new \Exception($this->error);
        }
        return $this->data;
    }
}