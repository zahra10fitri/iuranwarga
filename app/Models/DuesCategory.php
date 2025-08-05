<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesCategory extends Model
{
    //
     protected $fillable = ['period', 'nominal', 'status'];

    public function duesMembers()
    {
        return $this->hasMany(DuesMember::class, 'idduescategory');
    }
}
