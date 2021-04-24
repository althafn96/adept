<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vertical extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'title',
        'icon',
        'description',
        'status'
    ];

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class)->with('members');
    }
}
