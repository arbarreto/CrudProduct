<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newProduct extends Model {
    protected $table = 'products';
	protected $fillable = ['name', 'category_id', 'description', 'image', 'color', 'size'];
}
