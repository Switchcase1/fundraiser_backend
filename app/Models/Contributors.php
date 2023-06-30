<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributors extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'contributor_id',
        'campaign_id',
        'fund_given',
        'created_at'
    ];
}
