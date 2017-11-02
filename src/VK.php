<?php

use Modules\Account;
use Modules\AccessToken;
use Modules\Board;
use Modules\Users;
use Modules\Apps;

class VK
{
    /**
     * @var Account
     */
    public $account;

    /**
     * @var AccessToken
     */
    public $access_token;

    public $apps;

    public $board;

    /**
     * @var Users
     */
//    public $users;

    /**
     * VK constructor.
     */
    public function __construct()
    {
        $this->account = new Account();
        $this->access_token = new AccessToken();
        $this->apps = new Apps();
        $this->board = new Board();
//        $this->users = new Users();

        return $this;
    }
}