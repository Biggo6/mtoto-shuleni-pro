<?php

class Parentx extends \Eloquent {
	protected $table = "parents";
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	protected $fillable = [];
}