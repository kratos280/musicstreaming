<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 0:15
 */

class BaseModel extends Eloquent {
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
