<?php

class Message implements JsonSerializable
{

    public $id;
    public $chatid;
    public $message;
    public $userid;
    public $timestamp;

    public function __construct(
        int    $id,
        int    $chatid,
        string $message,
        int    $userid,
        int    $timestamp)
    {
        $this->timestamp = $timestamp;
        $this->userid = $userid;
        $this->message = $message;
        $this->chatid = $chatid;
        $this->id = $id;

    }

    public function user()
    {
        return (new UserRepository())->findById($this->userid);
    }

    public function jsonSerialize(): mixed
    {
        $dateTime = new DateTime(date("Y-m-d H:i:s",$this->timestamp));
        $dateTime->setTimezone(new DateTimeZone('GMT-4'));

        return [
            'id' => $this->id,
            'chatid' => $this->chatid,
            'message' => $this->message,
            'userid' => $this->userid,
            'ts' =>$dateTime,
            'user' => $this->user(),
        ];
    }
}