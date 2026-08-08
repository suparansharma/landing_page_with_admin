<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncompleteOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'landing_page_id',
        'name',
        'phone',
        'address'
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
