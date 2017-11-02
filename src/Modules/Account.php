<?php

namespace Modules;

class Account extends Main
{
    /**
     * @var Main
     */
    protected $api;

    public function __construct()
    {
        $this->api = new Main();
    }

    /**
     * Ban user by id
     * @param $user_id
     * @return Main
     */
    public function banUser($user_id)
    {
        $this->api->request("account.banUser", ["user_id" => $user_id]);

        return $this->api;
    }

    /**
     * Unban user by id
     * @param $user_id
     * @return Main
     */
    public function unbanUser($user_id)
    {
        $this->api->request("account.unbanUser", ["user_id" => $user_id]);

        return $this->api;
    }

    /**
     * Get current application permissions
     * @param string $user_id
     * @return Main
     */
    public function getAppPermissions($user_id = "")
    {
        $this->api->request("account.getAppPermissions", ["user_id" => $user_id]);

        return $this->api;
    }

    /**
     * Get list of users in blacklist
     * @param null $count
     * @return Main
     */
    public function getBanned($count = null)
    {
        // TODO: Доработать offset
        $this->api->request("account.getBanned", ["count" => $count]);

        return $this->api;
    }

    /**
     * Get user's counters (count inbox messages, notifications, etc.)
     * @param string $counters
     * @return Main
     */
    public function getCounters($counters = "")
    {
        $params = [
            "filter" => $counters
        ];

        $this->api->request("account.getCounters", $params);

        return $this->api;
    }

    /**
     * Get info about current account
     * @param string $fields
     * @return Main
     */
    public function getInfo($fields = "")
    {
        $params = [
            "fields" => $fields
        ];

        $this->api->request("account.getInfo", $params);

        return $this->api;
    }

    /**
     * Get info about current profile (if you want get info about other users, you should use users.get method)
     * @return Main
     */
    public function getProfileInfo()
    {
        $this->api->request("account.getProfileInfo");

        return $this->api;
    }

    public function getPushSettings()
    {
        // TODO: Получить настройки Push уведомлений для устройства
    }

    public function registerDevice()
    {
        // TODO: Регистрация устройства для получения push уведомлений
    }

    /**
     * Edit profile
     * @param array $fields - info about fields here => https://vk.com/dev/account.saveProfileInfo
     * @return Main
     */
    public function saveProfileInfo(array $fields)
    {
        $this->api->request("account.saveProfileInfo", $fields);

        return $this->api;

    }

    /**
     * Edit current account info.
     * @param array $settings
     *
     * Available settings: intro, own_posts_default, no_wall_replies
     *
     * @return Main
     */
    public function setInfo(array $settings)
    {
        $this->api->request("account.setInfo", $settings);

        return $this->api;
    }

    /**
     * Set short application name in left menu
     * @param $user_id
     * @param $name
     * @return Main
     */
    public function setNameInMenu($user_id, $name)
    {
        $this->api->request("account.setNameInMenu", ["user_id" => $user_id, "name" => $name]);

        return $this->api;
    }

    /**
     * Mark this user as 'offline' (only in current app)
     * @return Main
     */
    public function setOffline()
    {
        $this->api->request("account.setOffline", false);

        return $this->api;
    }

    /**
     * Mark this user as 'online' on 5 minutes
     * @param bool $voip - is voip enabled
     * @return Main
     */
    public function setOnline($voip = false)
    {
        $this->api->request("account.setOnline", ["voip" => $voip]);

        return $this->api;
    }
}