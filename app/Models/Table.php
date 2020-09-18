<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'minSlots',
        'maxSlots'
    ];

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function scopeAvailableOnDateWithSlots($query, $date, $slots)
    {
        return $query->whereDoesntHave('bookings', function ($booking) use ($date, $slots) {
            $booking->whereDate('date', '=', $date);
        })->where([
            ['minSlots', '<=', $slots],
            ['maxSlots', '>=', $slots]
        ]);
    }

    public function hasBookingOnDate($date): bool
    {
        return $this->bookings()->whereDate('date', '=', $date)->count() > 0 ?? false;
    }

    public function isFillableSlots($slots): bool
    {
        return ($this->minSlots <= $slots) && ($this->maxSlots >= $slots);
    }
}
