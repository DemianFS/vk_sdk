<?php

namespace Config;


class Config
{
    /**
     * User's configuration
     * @var array
     */
    public static $config = [
        "access_token" => "23c088d5676d88fc71450f8cdc94f3e4751ca9131a3472455d196285a15ef89eb341b150ac791d44b678a"
    ];

    const API_URL = "https://api.vk.com/method/";
    const AUTH_URL = "https://oauth.vk.com/authorize?";
    const API_VERSION = "5.68";
}