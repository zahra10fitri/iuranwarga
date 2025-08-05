<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesMember extends Model
{
    //
      protected $fillable = ['iduser', 'idduescategory'];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function category()
    {
        return $this->belongsTo(DuesCategory::class, 'idduescategory');
    }
}
