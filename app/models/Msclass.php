<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Msclass extends Eloquent {
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	protected $fillable = [];
}