<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title','icon','description','status'];

    public function verticals()
    {
        return $this->belongsToMany(Vertical::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
