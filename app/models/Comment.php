<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cuong
 * Date: 2015/03/14
 * Time: 0:14
 */
class Comment extends BaseModel
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    protected $fillable = ['*'];

    public function user()
    {
        return $this->belongsTo('User', "user_id", "user_id");
    }

}

class CommentObserver {

    public function created($model)
    {
        //

    }

    public function saved($model) {  }
    public function deleted($model) {  }
    public function restored($model) {  }

}

Comment::observe(new CommentObserver());