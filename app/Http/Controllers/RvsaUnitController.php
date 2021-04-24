<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\District;
use App\Models\RvsaUnit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class RvsaUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $units = RvsaUnit::all();

            return DataTables::of($units)
                ->addColumn('actions', function ($unit) {
                    return '';
                })
                ->addColumn('type', function ($unit) {
                    if ($unit->province_id == '1') {
                        $province = 'Western Province';
                    } elseif ($unit->province_id == '2') {
                        $province = 'Central Province';
                    } elseif ($unit->province_id == '3') {
                        $province = 'Southern Province';
                    } elseif ($unit->province_id == '4') {
                        $province = 'Uva Province';
                    } elseif ($unit->province_id == '5') {
                        $province = 'Sabaragamuwa Province';
                    } elseif ($unit->province_id == '6') {
                        $province = 'North Western Province';
                    } elseif ($unit->province_id == '7') {
                        $province = 'North Central Province';
                    } elseif ($unit->province_id == '8') {
                        $province = 'Nothern Province';
                    } elseif ($unit->province_id == '9') {
                        $province = 'Eastern Province';
                    } else {
                        $province = '';
                    }


                    $type = $unit->level == '1' ? 'Provincial' : 'Districtal';
                    $district_province = $unit->level == '1' ? 'Province: ' . $province .'' : 'District: ' . $unit->district->title .'';
                    $rvsa_unit = $unit->rvsa_unit_id == null ? '' : 'RVSA Provincial Unit: '.$unit->rvsaUnit->title . '';
                    return '
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                '.$type.'
                            </div>
                            <div class="text-sm text-gray-500">
                                '.$district_province.'
                            </div>
                            <div class="text-sm text-gray-500">
                                '.$rvsa_unit.'
                            </div>
                        </div>
                    </div>
                    ';
                })
                ->addColumn('picture', function ($unit) {
                    return '<image src="'.asset("/storage"). '/'. $unit->picture.'" class="h-20" />';
                })
                ->addColumn('province_id', function ($unit) {
                    if ($unit->province_id == '1') {
                        return 'Western Province';
                    } elseif ($unit->province_id == '2') {
                        return 'Central Province';
                    } elseif ($unit->province_id == '3') {
                        return 'Southern Province';
                    } elseif ($unit->province_id == '4') {
                        return 'Uva Province';
                    } elseif ($unit->province_id == '5') {
                        return 'Sabaragamuwa Province';
                    } elseif ($unit->province_id == '6') {
                        return 'North Western Province';
                    } elseif ($unit->province_id == '7') {
                        return 'North Central Province';
                    } elseif ($unit->province_id == '8') {
                        return 'Nothern Province';
                    } elseif ($unit->province_id == '9') {
                        return 'Eastern Province';
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['action', 'picture', 'type'])
                ->make('true');
        }

        return view('rvsa_units.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'title' =>'required',
            'responsible_person'  => 'required',
            'contact_phone' =>'required',
            'contact_email' =>'required|email'
        ]);

        if ($request->type == 'level1') {
            request()->validate([
                'province_id' =>'required'

            ], [
                'province_id.required' => 'The province field is required'
            ]);
        } else {
            request()->validate([
                'district_id' =>'required',
                'rvsa_unit_id' =>'required'

            ], [
                'district_id.required' => 'The district field is required',
                'rvsa_unit_id.required' => 'The RVSA unit field is required',
            ]);
        }

        if ($request->has('file')) {
            $image = $request->file('file');
            $fileName   = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $typeimage = $image->storeAs('rvsa_units', $fileName);

            $img = Image::make($image->getRealPath());
            $img->fit(500, 500);
            $img->stream();

            Storage::put('rvsa_units/'.$fileName, $img, 'public');
        } else {
            $typeimage = 'noimage.jpg';
        }

        $unit = RvsaUnit::create([
                'title' => $request->title,
                'responsible_person' => $request->responsible_person,
                'contact_phone' => $request->contact_phone,
                'contact_email' => $request->contact_email,
                'province_id' => $request->type == 'level1' ? $request->province_id : null,
                'district_id' => $request->type == 'level2' ? $request->district_id : null,
                'rvsa_unit_id' => $request->type == 'level2' ? $request->rvsa_unit_id : null,
                'level' => $request->type == 'level1' ? '1' : '2',
                'address' => $request->address,
                'picture' => $typeimage
        ]);

        return redirect('/rvsa-units')->with('success', 'RVSA unit added successfully');
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
    public function update(Request $request, RvsaUnit $rvsaUnit)
    {
        request()->validate([

            'title' =>'required',
            'responsible_person'  => 'required',
            'contact_phone' =>'required',
            'contact_email' =>'required|email'
        ]);

        if ($request->type == 'level1') {
            request()->validate([
                'province_id' =>'required'

            ], [
                'province_id.required' => 'The province field is required'
            ]);
        } else {
            request()->validate([
                'district_id' =>'required',
                'rvsa_unit_id' =>'required'

            ], [
                'district_id.required' => 'The district field is required',
                'rvsa_unit_id.required' => 'The RVSA unit field is required',
            ]);
        }

        if ($request->has('file')) {
            $image = $request->file('file');
            $fileName   = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $typeimage = $image->storeAs('rvsa_units', $fileName);

            $img = Image::make($image->getRealPath());
            $img->fit(500, 500);
            $img->stream();

            Storage::put('rvsa_units/'.$fileName, $img, 'public');
        } else {
            $typeimage = $rvsaUnit->picture;
        }

        $rvsaUnit->update([
            'title' => $request->title,
            'responsible_person' => $request->responsible_person,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'province_id' => $request->type == 'level1' ? $request->province_id : null,
            'district_id' => $request->type == 'level2' ? $request->district_id : null,
            'rvsa_unit_id' => $request->type == 'level2' ? $request->rvsa_unit_id : null,
            'level' => $request->type == 'level1' ? '1' : '2',
            'address' => $request->address,
            'picture' => $typeimage
        ]);

        return redirect('/rvsa-units')->with('success', 'RVSA unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RvsaUnit $rvsaUnit)
    {
        $rvsaUnit->delete();

        return redirect('/rvsa-units')->with('success', 'RVSA unit removed successfully');
    }

    public function edit(RvsaUnit $rvsaUnit)
    {
        $districts = District::where('status', '1')->get();
        $units = RvsaUnit::where('rvsa_unit_id', null)->get();

        return view('rvsa_units.edit', compact('rvsaUnit', 'districts', 'units'));
    }

    public function create()
    {
        $districts = District::where('status', '1')->get();
        $units = RvsaUnit::where('rvsa_unit_id', null)->get();

        return view('rvsa_units.create', compact(
            'districts',
            'units'
        ));
    }
}
