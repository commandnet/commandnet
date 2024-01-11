<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    use HasFactory;
    public function getDisplayNameAttribute()
    {
        return $this->created_at->format("Y-m-d H:i") . ' - ' . $this->name;
    }
    protected $appends = ['DisplayName'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'ended_at' => 'datetime:Y-m-d H:i',
    ];
}
