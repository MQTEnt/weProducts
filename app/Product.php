<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
		'name',
		'vipon_link',
		'amazon_link',
		'sold_price',
		'item_cost',
		'code',
		'note',
		'expiry_date',
    ];

    protected $appends = ['expiredDay'];

    public function getExpiredDayAttribute()
    {
    	$currentDate = \Carbon\Carbon::now();
    	$expiryDate = \Carbon\Carbon::parse($this->expiry_date);
		return $currentDate->diffInDays($expiryDate, false);
    }
}