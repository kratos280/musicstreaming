<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/13
 * Time: 12:40
 */

App::missing(function($exception)
{
    return "404 Not Found";
});

App::error(function(Exception $exception, $code) {
    $message = $exception->getMessage();
    if( $code >= 500 ) {
        Log::error($exception);
    }

    switch($code) {
        case 400:
            return "400 Bad Request";
        case 401:
            return "401 Unauthorized";
        case 403:
            return "403 Forbidden";
        case 500:
            return "500 Internal Server Error";
        case 503:
            return "503 Temporarily Unavailable";
    }
});