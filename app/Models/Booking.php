<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public const APPROVED = 0;
    public const PENDING = 1;

	public const STATUSES = [
		self::APPROVED => true,
		self::PENDING => false
    ];

    public static function statuses()
	{
		return self::STATUSES;
	}
	
	public function statusLabel()
	{
		$statuses = $this->statuses();
		
		return isset($this->status) ? $statuses[$this->status] : null;
	}
    
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
