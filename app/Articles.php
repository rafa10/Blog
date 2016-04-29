<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model {

	protected $table = 'articles';

    protected $fillable = ['author', 'title', 'content', 'online'];

    public function Comments()
    {
        return $this->hasMany('App\Comments');
    }

}
