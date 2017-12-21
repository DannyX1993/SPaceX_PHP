<?php

namespace wrappers;

class JSONUserWrapper extends JSONWrapper
{

    protected $id;

    protected $created;

    protected $nickname;

    protected $email;

    protected $lastAccess;

    public function __construct()
    {
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCreated(int $date)
    {
        $this->created = $date;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setNickname(string $nick)
    {
        $this->nickname = $nick;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setLastAccess($time)
    {
        $this->lastAccess = $time;
    }

    public function getLastAccess()
    {
        return $this->lastAccess;
    }

}
