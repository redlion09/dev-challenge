<?php

class User implements JsonSerializable
{

    public $id;
    public $username;

    public function __construct(
        int    $id,
        string    $username)
    {
        $this->id = $id;
        $this->username = $username;

    }


    public function jsonSerialize():mixed
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
        ];
    }
}