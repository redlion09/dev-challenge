<?php

class MessageRepository
{

    public function all(){

        return array_map(function ($message){
            return new Message (
                $message['id'],
                $message['chatid'],
                $message['message'],
               $message['userid'],
               $message['ts']
            );
        },json_decode(file_get_contents(__DIR__."/../../data/messages.json"),true));
    }

    public function findByChatId (int $chatid){

        $messages = array_values(array_filter($this->all(), function ($message) use ($chatid){
            return $message->chatid === $chatid;
        }));

        if(count($messages)===0){
            throw  new Exception("Message with chatid " . [$chatid] . "could not be found");
        }


        return $messages;
    }

    public function findByMessageId (int $messageid){

        $messages = array_values(array_filter($this->all(), function ($message) use ($messageid){
            return $message->id === $messageid;
        }));

        if(count($messages)===0){
            throw  new Exception("Message with messageid " . [$messageid] . "could not be found");
        }


        return $messages;
    }
}