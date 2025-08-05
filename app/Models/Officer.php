<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    //
      protected $table = 'officers';

    protected $fillable = [
        'iduser',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
