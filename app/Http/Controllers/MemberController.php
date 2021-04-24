<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Member;
use App\Models\RvsaUnit;
use App\Models\Specialization;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $members = Member::all();

            return DataTables::of($members)
                ->addColumn('name', function ($member) {
                    return $member->first_name . ' ' . $member->last_name;
                })
                ->addColumn('actions', function ($member) {
                    return '';
                })
                ->addColumn('specializations', function ($member) {
                    $output = '';
                    foreach ($member->specializations as $specialization) {
                        $output .= '
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                            '.$specialization->title.'
                        </span>
                        ';
                    }
                    return $output;
                })
                ->addColumn('cities', function ($member) {
                    $output = '';
                    foreach ($member->cities as $city) {
                        $output .= '
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                            '.$city->title.'
                        </span>
                        ';
                    }
                    return $output;
                })
                ->addColumn('areas', function ($member) {
                    $output = '';
                    foreach ($member->areas as $area) {
                        $output .= '
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                            '.$area->title.'
                        </span>
                        ';
                    }
                    return $output;
                })
                ->addColumn('picture', function ($member) {
                    return '<image src="'.asset("/storage"). '/'. $member->picture.'" class="h-20" />';
                })
                ->addColumn('rvsa_unit', function ($member) {
                    return $member->rvsaUnit->title;
                })
                ->rawColumns(['action','picture','specializations','cities','areas'])
                ->make('true');
        }

        return view('members.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request() ->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'rvsa_id' =>'required|unique:members,rvsa_id',
            'mobile_1' =>'required',
            'areas' =>'required',
            'email' =>'nullable|email',
            'specializations' =>'required',
            'rvsa_unit_id' =>'required'
        ], [
            'rvsa_unit_id.required' => 'The RVSA unit field is required'
        ]);

        if ($request->has('file')) {
            $image = $request->file('file');
            $fileName   = time() . '-' . Str::slug($request->first_name) . '.' . $image->getClientOriginalExtension();
            $typeimage = $image->storeAs('members', $fileName);

            $img = Image::make($image->getRealPath());
            $img->fit(500, 500);
            $img->stream();

            Storage::put('members/'.$fileName, $img, 'public');
        } else {
            $typeimage = 'noimage.jpg';
        }

        $member = Member::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'picture' => $typeimage,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'nic' => $request->nic,
            'rvsa_id' => $request->rvsa_id,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'email' => $request->email,
            'status' => $request->status,
            'rvsa_unit_id' => $request->rvsa_unit_id,
            'address' => $request->address,
            'other_skills_experience_and_qualifications' => $request->other_skills_experience_and_qualifications
        ]);

        $member->specializations()->sync($request->specializations);
        $member->areas()->sync($request->areas);


        return redirect('/members')->with('success', 'Member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        request() ->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'rvsa_id' =>'required|unique:members,rvsa_id,'.$member->id.',id',
            'mobile_1' =>'required',
            'areas' =>'required',
            'email' =>'nullable|email',
            'specializations' =>'required',
            'rvsa_unit_id' =>'required'
        ], [
            'rvsa_unit_id.required' => 'The RVSA unit field is required'
        ]);

        if ($request->has('file')) {
            $image = $request->file('file');
            $fileName   = time() . '-' . Str::slug($request->first_name) . '.' . $image->getClientOriginalExtension();
            $typeimage = $image->storeAs('members', $fileName);

            $img = Image::make($image->getRealPath());
            $img->fit(500, 500);
            $img->stream();

            Storage::put('members/'.$fileName, $img, 'public');
        } else {
            $typeimage = $member->picture;
        }

        $member->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'picture' => $typeimage,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'nic' => $request->nic,
            'rvsa_id' => $request->rvsa_id,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'email' => $request->email,
            'status' => $request->status,
            'rvsa_unit_id' => $request->rvsa_unit_id,
            'address' => $request->address,
            'other_skills_experience_and_qualifications' => $request->other_skills_experience_and_qualifications
        ]);

        $member->specializations()->sync($request->specializations);
        $member->areas()->sync($request->areas);


        return redirect('/members')->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect('/members')->with('success', 'Member removed successfully');
    }

    public function edit(Member $member)
    {
        $districts = District::where('status', '1')->get();
        $cities = City::where('status', '1')->get();
        $districts = District::where('status', '1')->get();
        $specializations = Specialization::where('status', '1')->get();
        $units = RvsaUnit::where('level', '2')->get();


        $member_cities = array();

        foreach ($member->cities as $city) {
            array_push($member_cities, $city->id);
        }
        $member_specializations = array();

        foreach ($member->specializations as $specialization) {
            array_push($member_specializations, $specialization->id);
        }
        $member_areas = array();

        foreach ($member->areas as $area) {
            array_push($member_areas, $area->id);
        }

        return view('members.edit', compact('member', 'cities', 'districts', 'specializations', 'member_cities', 'member_specializations', 'member_areas', 'units'));
    }

    public function create()
    {
        $districts = District::where('status', '1')->get();
        $cities = City::where('status', '1')->get();
        $specializations = Specialization::where('status', '1')->get();
        $units = RvsaUnit::where('level', '2')->get();

        return view('members.create', compact('cities', 'districts', 'specializations', 'units'));
    }
}
