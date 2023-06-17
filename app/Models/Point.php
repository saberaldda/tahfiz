<?php

namespace App\Models;

use App\Models\Scopes\PointsDateScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::addGlobalScope(new PointsDateScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function activityOption()
    {
        return $this->belongsTo(ActivityOption::class);
    }
}
