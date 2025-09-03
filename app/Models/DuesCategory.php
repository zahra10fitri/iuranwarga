<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesCategory extends Model
{
    protected $table = 'dues_categories';

    protected $fillable = ['period', 'nominal', 'status'];

    public function duesMembers()
    {
        return $this->hasMany(DuesMember::class, 'idduescategory');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'idduescategory');
    }
}
