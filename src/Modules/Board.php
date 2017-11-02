<?php
/**
 * Created by PhpStorm.
 * User: El
 * Date: 29.10.2017
 * Time: 11:49
 */

namespace Modules;


class Board extends Main
{
    protected $api ;

    public function __construct()
    {
        $this->api = new Main();
    }


    /**
     * Create a new topic in discussions list.
     *
     * @param $group_id
     * @param $title
     * @param $text
     * @param int $from_group
     * @param null $attachments
     * @return Main
     */
    public function addTopic($group_id, $title, $text, $from_group = 1, $attachments = null)
    {
        $params = [
            "group_id" => $group_id,
            "title" => $title,
            "text" => $text,
            "from_group" => $from_group,
            "attachments" => $attachments
        ];

        $this->api->request('board.addTopic', $params);
        return $this->api;
    }


    /**
     * Close topic in discussions
     * @param $group_id
     * @param $topic_id
     * @return Main
     */
    public function closeTopic($group_id, $topic_id)
    {
        $this->api->request('board.closeTopic', ["group_id" => $group_id, "topic_id" => $topic_id]);
        return $this->api;
    }

    /**
     * Create comment in topic
     * @param $group_id
     * @param $topic_id
     * @param $message
     * @param int $from_group
     * @param null $attachments
     * @param null $sticker_id
     * @return Main
     */
    public function createComment($group_id, $topic_id, $message, $from_group = 0, $attachments = null, $sticker_id = null)
    {
        $params = [
            "group_id" => $group_id,
            "topic_id" => $topic_id,
            "message" => $message,
            "from_group" => $from_group,
            "attachments" => $attachments,
            "sticker_id" => $sticker_id
        ];

        $this->api->request('board.createComment', $params);
        return $this->api;
    }


    /**1
     * Delete comment from topic
     * @param $group_id
     * @param $topic_id
     * @param $comment_id
     * @return Main
     */
    public function deleteComment($group_id, $topic_id, $comment_id)
    {
        $params = [
            "group_id" => $group_id,
            "topic_id" => $topic_id,
            "comment_id" => $comment_id
        ];

        $this->api->request('board.deleteComment', $params);

        return $this->api;
    }


    /**
     * Delete topic from discussions
     * @param $group_id
     * @param $topic_id
     * @return Main
     */
    public function deleteTopic($group_id, $topic_id)
    {
        $this->api->request('board.deleteTopic', ["group_id" => $group_id, "topic_id" => $topic_id]);
        return $this->api;
    }


    /**
     * Edit comment from topic
     * @param $group_id
     * @param $topic_id
     * @param $comment_id
     * @param $message
     * @param null $attachments
     * @return Main
     */
    public function editComment($group_id, $topic_id, $comment_id, $message, $attachments = null)
    {
        $params = [
            "group_id" => $group_id,
            "topic_id" => $topic_id,
            "comment_id" => $comment_id,
            "message" => $message,
            "attachments" => $attachments
        ];

        $this->api->request('board.editComment',$params);

        return $this->api;
    }


    /**
     * Edit topic
     * @param $group_id
     * @param $topic_id
     * @param $title
     * @return Main
     */
    public function editTopic($group_id, $topic_id, $title)
    {

        $this->api->request('board.editTopic', ["group_id" => $group_id, "topic_id" => $topic_id, "title" => $title]);

        return $this->api;
    }


    /**
     * Fix the topic in discussions (this topic must be higher than others)
     * @param $group_id
     * @param $topic_id
     * @return Main
     */
    public function fixTopic($group_id, $topic_id)
    {

        $this->api->request('board.fixTopic', ["group_id" => $group_id, "topic_id" => $topic_id]);

        return $this->api;
    }


    /**
     * Get comments from topic
     * @param $group_id
     * @param $topic_id
     * @param int $count
     * @param null $offset
     * @param null $need_likes
     * @return Main
     */
    public function getComments($group_id, $topic_id, $count = 20, $offset = null, $need_likes = null)
    {
        $params = [
            "group_id" => $group_id,
            "topic_id" => $topic_id,
            "count" => $count,
            "offset" => $offset,
            "need_likes" => $need_likes
        ];

        $this->api->request('board.getComments',$params)->comments;
        return $this->api;
    }


    /**
     * Get topics from discussions
     * @param $group_id
     * @return Main
     */
    public function getTopics($group_id)
    {

        $params = [
            "group_id" => $group_id
        ];
        $this->api->request('board.getTopics',$params);

        return $this->api;
    }

    /**
     * Open closed topic
     * @param $group_id
     * @param $topic_id
     * @return Main
     */
    public function openTopic($group_id, $topic_id)
    {
        $this->api->request('board.openTopic', ["group_id" => $group_id, "topic_id" => $topic_id]);

        return $this->api;
    }


    /**
     * Restore deleted comment
     * @param $group_id
     * @param $topic_id
     * @param $comment_id
     * @return Main
     */
    public function restoreComment($group_id, $topic_id, $comment_id)
    {
        $params = [
            "group_id" => $group_id,
            "topic_id" => $topic_id,
            "comment_id" => $comment_id
        ];

        $this->api->request('board.restoreComment',$params);
        return $this->api;
    }


    /**
     * Unfix fixed topic
     * @param $group_id
     * @param $topic_id
     * @return Main
     */
    public function unfixTopic($group_id, $topic_id)
    {

        $this->api->request('board.unfixTopic', ["group_id" => $group_id, "topic_id" => $topic_id]);
        return $this->api;
    }
}