<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;

class Category extends Model
{
	use SoftDeletes;
    protected $fillable = ['category_name','parent_category','slug'];

    protected $dates = ['deleted_at'];

    public function parentCategory(){
    	return $this->belongsTo(Category::class,"parent_category")->withTrashed();
    }

}
