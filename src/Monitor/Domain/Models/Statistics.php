<?php

namespace Monitor\Models;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
