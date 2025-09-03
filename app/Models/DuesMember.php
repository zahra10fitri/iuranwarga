<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesMember extends Model
{
    protected $table = 'dues_members';

    protected $fillable = ['iduser', 'idduescategory', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

        public function category()
        {
            return $this->belongsTo(DuesCategory::class, 'idduescategory');
        }

    // akses otomatis nominal dari kategori
    public function getJumlahAttribute()
    {
        return $this->category ? $this->category->nominal : 0;
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class DuesMember extends Model
// {
//     //
  
//     protected $table = 'dues_members';

//     protected $fillable = ['iduser', 'idduescategory', 'status'];

//     public function user()
//     {
//         return $this->belongsTo(User::class, 'iduser');
//     }

//    public function category()
//     {
//         return $this->belongsTo(DuesCategory::class, 'idduescategory');
//     }


//     // akses otomatis jumlah dari kategori
//     public function getJumlahAttribute()
//     {
//         return $this->category ? $this->category->jumlah : 0;
//     }

    
// }

