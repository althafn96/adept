<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title','district_id','status'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
