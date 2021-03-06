<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner',
        'product_id',
        'address',
        'salary',
        'numberphone',
        'note',
        'money',
        'status'
    ];
    protected $hidden = [

    ];
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
