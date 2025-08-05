<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
      protected $fillable = ['iduser', 'period', 'nominal', 'petugas'];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
