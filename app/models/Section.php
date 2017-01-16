<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Section extends \Eloquent {
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	protected $fillable = [];
}