<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/13
 * Time: 12:41
 */

Blade::extend(function($value)
{
    return preg_replace('/(\s*)@(break|continue)(\s*)/', '$1<?php $2; ?>$3', $value);
});

Blade::extend(function($value)
{
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
});
