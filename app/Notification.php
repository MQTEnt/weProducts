<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Notification extends Model
{
    protected $fillable = [
		'checked',
		'content',
		'product_id',
		'user_id'
    ];
}