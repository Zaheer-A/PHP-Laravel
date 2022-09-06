<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];


//    protected $table = 'possts'; by default Laravel thinks you have a (lowercase class name)s table
//    protected $primaryKey = 'id'; this is also default but you can change it according to your table!

    protected $table = 'possts';
    protected $fillable = [
        "title",
        "body"
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
