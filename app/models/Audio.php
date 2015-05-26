<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 0:14
 */
class Audio extends BaseModel
{

    use SoftDeletingTrait;

    protected $table = 'audios';
    protected $primaryKey = 'audio_id';
    protected $fillable = ['*'];
    protected $dates = ['deleted_at'];

}