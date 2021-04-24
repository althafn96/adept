<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'first_name',
        'last_name',
        'picture',
        'mobile_1',
        'mobile_2',
        'nic',
        'rvsa_id',
        'dob',
        'gender',
        'email',
        'status',
        'rvsa_unit_id',
        'address',
        'other_skills_experience_and_qualifications'
    ];

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function areas()
    {
        return $this->belongsToMany(District::class, 'district_member', 'member_id', 'district_id');
    }

    public function rvsaUnit()
    {
        return $this->belongsTo(RvsaUnit::class);
    }
}
