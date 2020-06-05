<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    protected $fillable=['category_name','category_description','publication_status'];
    protected $hidden=['created_at','updated_at'];
}
