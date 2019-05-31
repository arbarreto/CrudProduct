<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieModel extends Model {
    protected $table = 'categories';
	protected $fillable = ['categorie'];

}