<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'body',
        'location',
        'files',
        'money',
        'salary',
        'owner'
    ];
    protected $hidden = [

    ];
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
