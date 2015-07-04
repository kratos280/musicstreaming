<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 15/06/07
 * Time: 1:04
 */

class Games {

    const WORK = "congviec";
    const MY_NUMBER = "somayman";

    static $games = array(
        self::WORK => array(
            'path' => self::WORK,
            'title' => 'Bạn Phù Hợp Với Nghề Nào Nhất?'
        ),
        self::MY_NUMBER => array(
            'path' => self::WORK,
            'title' => 'Con số may mắn của bạn là số mấy ?'
        )
    );
}