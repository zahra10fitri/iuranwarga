<?php

namespace App\Models;
use App\Models\DuesCategory;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['iduser', 'idduescategory', 'period', 'nominal', 'petugas'];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function category()
    {
        return $this->belongsTo(DuesCategory::class, 'idduescategory');
    }
}

