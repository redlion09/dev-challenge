<?php

class UserRepository
{
    public function all(){

        return array_map(function ($user){
            return new User (
                $user['id'],
                $user['username']
            );
        },json_decode(file_get_contents(__DIR__."/../../data/users.json"),true));
    }

    public  function findById(int $id){

        $users = array_values(array_filter($this->all(), function ($user) use ($id){
           return $user->id === $id;
        }));

        if(count($users)===0){
            throw  new Exception("User with id" . [$id] . "could not be found");
        }


        return $users;
    }
}