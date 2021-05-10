<?php
namespace Matt;

class FormValidate {
    private array $keys;
    private array $datas;
    private array $error = array();
    private string $type;

    public function __construct(array $input, string $type)
    {
        $this->datas = $input;
        $this->type = $type;
        $this->formColumnType();
    }

    private function formColumnType () 
    {
        $type = $this->type;
        switch ($type) {
            case 'register':
                $this->keys = ['nick_name', 'email', 'password', 'image'];
                break;
            case 'login':
                $this->keys = ['email', 'password'];
                break;
            case 'send':
                $this->keys = ['sender_id', 'receiver_id', 'message'];
                break;
            default:
                $this->keys = [];
                break;
        }
    }

    public function validate()
    {
        $this->checkRequired();
        $this->checkEmail();
        $this->checkImage();
        return ['errors' => $this->error, 'inputs' => $this->datas];
    }

    private function checkRequired()
    {
        foreach ($this->keys as $key) {
            if (!isset($this->datas[$key]) || strlen(trim($this->datas[$key])) == 0) {
                $this->error[] = "$key is required.";
            } else {
                $this->datas[$key] = htmlentities($this->datas[$key]);
            }
        }
    }

    private function checkEmail()
    {
        if ($this->error) {
            return ;
        }
        if ($this->type == 'register' || $this->type == 'login') {
            if (!filter_var($this->datas['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error[] = "Invalid Email.";
            }
        }
    }

    private function checkImage()
    {
        if ($this->error) {
            return ;
        }
        if ($this->type == 'register') {
            $images = ["dog.jpg", "duck.png", "frog.jpg", "light.png", "lovely.jpg", "smartphone.jpg", "tiger.png", "tooth.png"];
            if (!in_array($this->datas['image'], $images)) {
                $this->error[] = "Invalid image.";
            }
        }
    }
}