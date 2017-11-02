<?php

namespace Modules;
use Config\Config;

class AccessToken
{
    /**
     * Generate url for receiving access token
     * @param $client_id - application id
     * @param string $redirect_uri - redirect url after receiving token. if you use messages scope, redirect_uri must be "https://oauth.vk.com/blank.html"
     *
     * @param $display -
     * page — Authorization form in other window;
     * popup — popup window;
     * mobile — authorization for mobile devices
     *
     * @param string $scope - scopes. If not specified, method will use all scopes.
     * @return mixed
     */
    public function generateUrl($client_id, $display, $scope = "default", $redirect_uri = "https://oauth.vk.com/blank.html")
    {
        if ($scope == "default") {
            $scopes = "notify, friends, photos, audio, video, app_widget, pages, status, notes, messages," .
                "wall, ads, offline, docs, groups, notifications, stats, email, market";
        } else if (is_array($scope)) {
            $scopes = "";
            foreach ($scope as $item) {
                $scopes .= "," . $item;
            }
            $scopes = substr($scopes, 1);
        }

        $params = [
            "client_id" => $client_id,
            "redirect_uri" => $redirect_uri,
            "display" => $display,
            "scope" => $scopes,
            "response_type" => "token",
            "v" => Config::API_VERSION
        ];

        $url = Config::AUTH_URL . http_build_query($params);

        return $url;
    }

    public function get()
    {
        return Config::$config["access_token"];
    }
}