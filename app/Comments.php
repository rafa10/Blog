<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	protected $table = 'comments';

    protected $fillable = ['content', 'articles_id'];

    public function Articles()
    {
        return $this->belongsTo('App\Articles');
    }

}
