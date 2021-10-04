<?php

namespace Monitor\Models;

use App\Traits\Statusable;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use Statusable;

    protected $fillable = [
        'url'
    ];
    
    protected $dates = [
    ];

    public function statistics()
    {
        return $this->hasMany(Statistics::class);
    }

    public function getUrlAttribute()
    {
        if (! isset($this->attributes['url'])) {
            return null;
        }

        return $this->attributes['url'];
    }
}
