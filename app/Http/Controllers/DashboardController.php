<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\District;
use App\Models\RvsaUnit;
use App\Models\Vertical;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $members = Member::where('status', '1')->get();
        $verticals = Vertical::where('status', '1')->get();
        $specializations = Specialization::where('status', '1')->get();
        $areas = District::where('status', '1')->get();
        $units = RvsaUnit::get();

        foreach ($verticals as $vertical) {
            $vertical_member_ids = array();
            foreach ($vertical->specializations as $specialization) {
                foreach ($specialization->members as $member) {
                    if (!in_array($member->id, $vertical_member_ids)) {
                        array_push($vertical_member_ids, $member->id);
                    }
                }
            }

            $vertical['members_count'] = sizeof($vertical_member_ids);
        }

        $age_range = [ // the start of each age-range.
            '01 - 25' => 0,
            '26 - 40' => 0,
            '41 - 50' => 0,
            '51 - 60' => 0,
            '60+' => 0
        ];
        $members_by_age_range = Member::get()
                    ->map(function ($user) use ($age_range) {
                        $age = Carbon::parse($user->dob)->age;
                        foreach ($age_range as $key => $breakpoint) {
                            if ($breakpoint >= $age) {
                                $user->range = $key;
                                break;
                            }
                        }

                        return $user;
                    })
                    ->mapToGroups(function ($user, $key) {
                        return [$user->range => $user];
                    })
                    ->map(function ($group) {
                        return count($group);
                    })
                    ->sortKeys();

        return view('dashboard', compact(
            'members',
            'verticals',
            'specializations',
            'areas',
            'units',
            'members_by_age_range'
        ));
    }
}
