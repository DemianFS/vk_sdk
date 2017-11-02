<?php

namespace Modules;
use Config\Config;

class Main
{

    public $response;

    /**
     * Request to VK API
     * @param $method - method (example messages.get)
     * @param array $params - parameters, associative array, (example ["user_id" => "1"])
     * @return mixed
     * @throws \Exception
     */
    protected function request($method, $params = [])
    {
        if (!isset($params["access_token"]))
            $params["access_token"] = Config::$config["access_token"];

        $url = Config::API_URL . "$method?" . http_build_query($params);
        $curl = curl_init($url);

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $request = curl_exec($curl);
        $this->response = json_decode($request)->response;

        if (empty($this->response) && Config::$config["access_token"] == "")
            throw new \Exception("Invalid request. Add your access_token in Config");

        if (isset($this->response->error))
            throw new \Exception($this->response->error->error_msg, $this->response->error->error_code);

        return $this->response;
    }
}