<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RvsaUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'responsible_person',
        'contact_phone',
        'contact_email',
        'district_id',
        'province_id',
        'rvsa_unit_id',
        'level',
        'address',
        'picture'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function rvsaUnit()
    {
        return $this->belongsTo(RvsaUnit::class, 'rvsa_unit_id', 'id');
    }
}
