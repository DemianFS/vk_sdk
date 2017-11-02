<?php

namespace Modules;


class Apps extends Main
{

    /**
     * @var Main
     */
    private $api;

    /**
     * Apps constructor.
     */
    public function __construct()
    {
        $this->api = new Main();
    }

    /**
     * Deletes all request notifications from the current app.
     * @return Main
     */
    public function deleteAppRequests()
    {
        $this->api->request("apps.deleteAppRequests");

        return $this->api;
    }

    /**
     * Returns applications data.
     *
     * @param $app_id
     * @param string $platform - app's platform. Possible values: ios, android, winphone, web. Default - web.
     * @param bool $extended - true to return extended fields
     * @param bool $return_friends - true to return fields 'friends, profiles'
     * @param string $fields - works only if return_fields is true
     * @return Main
     * @throws \Exception
     */
    public function get($app_id, $platform = "web", $extended = false, $return_friends = false, $fields = "")
    {
        $params = [
            "app_id" => $app_id,
            "platform" => $platform,
            "fields" => $fields
        ];

        if ($return_friends && $fields) {
            $params["return_friends"] = $return_friends;
            $params["fields"] = $fields;
        } elseif (!$return_friends && $fields) {
            throw new \Exception("Param 'return_friends' must be true, to use 'fields'");
        }

        $this->api->request('apps.get', $params);

        return $this->api;
    }

    /**
     * Returns a list of applications (apps) available to users in the App Catalog.
     * @param $params - [
     *
     * @see https://vk.com/dev/apps.getCatalog
     *
     * ]
     * @return Main
     */
    public function getCatalog($params = []) {

        $this->api->request('apps.getCatalog', $params);

        return $this->api;
    }


    /**
     * Creates friends list for requests and invites in current app.
     * @param bool $extended
     * @param array $params [
     *
     * @see https://vk.com/dev/apps.getFriendsList
     *
     * ]
     * @return Main
     */
    public function getFriendsList($extended = true, $params = [])
    {

        if ($extended)
            $params["extended"] = $extended;

        $this->api->request('apps.getFriendsList',$params);
        return $this->api;
    }

    public function getLeaderboard($type, $global = null, $extended = false)
    {

        $params = [
            "type" => $type,
            "global" => $global,
            "extended" => $extended
        ];

        $this->api->request('apps.getLeaderboard',$params);

        return $this->api;
    }

    /**
     * Returns user score in app
     * @param $user_id
     * @return Main
     */
    public function getScore($user_id) {

        $this->api->request('apps.getScore', ["user_id" => $user_id]);

        return $this->api;
    }

    /**
     * Sends a request to another user in an app that uses VK authorization.
     *
     * @param $user_id
     * @param string $text
     * @param string $type
     * @param string $name
     * @param string $key
     * @param int $separate
     * @return Main
     */
    public function sendRequest($user_id, $text = "", $type = "request", $name = "", $key = "", $separate = 0)
    {
        $params = [
            "user_id" => $user_id,
            "text" => $text,
            "type" => $type,
            "name" => $name,
            "key" => $key,
            "separate" => $separate
        ];

        $this->api->request('apps.sendRequest', $params);

        return $this->api;
    }
}