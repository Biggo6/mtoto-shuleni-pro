<?php

class Student extends \Eloquent {
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	protected $fillable = [];
}