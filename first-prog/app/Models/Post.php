<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    protected $table = 'possts'; by default Laravel thinks you have a (lowercase class name)s table
//    protected $primaryKey = 'id'; this is also default but you can change it according to your table!

    protected $table = 'possts';

}
