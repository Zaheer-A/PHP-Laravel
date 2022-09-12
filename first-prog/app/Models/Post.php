<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    public $directory = '/images/';
    use SoftDeletes, HasFactory;

    protected $dates = ['deleted_at'];


//    protected $table = 'possts'; by default Laravel thinks you have a (lowercase class name)s table
//    protected $primaryKey = 'id'; this is also default but you can change it according to your table!

    protected $table = 'possts';
    protected $fillable = [
        "title",
        "body",
        "path"
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    //Get the tags for this post
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }


    public static function scopeRecent($query){
        return $query->orderBy('id', 'asc')->get();
    }

    public function getPathAttribute($value){
        return $this->directory . $value;
    }

}
