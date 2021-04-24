<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;
use DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $cities = City::all();

            return DataTables::of($cities)
                ->addColumn('actions', function ($city) {
                    return '';
                })
                ->addColumn('district', function ($city) {
                    return $city->district->title;
                })
                ->rawColumns(['action','icon'])
                ->make('true');
        }

        return view('cities.index');
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
            'district_id' => 'required'

        ], [
            'title.required' => 'The city name field is required',
            'district_id.required' => 'The district field is required'
        ]);

        City::create([
                'title' => $request->title,
                'status' => $request->status,
                'district_id' => $request->district_id
        ]);


        return redirect('/cities')->with('success', 'City added successfully');
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
    public function update(Request $request, City $city)
    {
        request()->validate([

            'title' =>'required',
            'district_id' => 'required'

        ], [
            'title.required' => 'The city name field required',
            'district_id.required' => 'The district field required'
        ]);

        $city->update([
                'title' => $request->title,
                'status' => $request->status,
                'district_id' => $request->district_id
        ]);


        return redirect('/cities')->with('success', 'City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect('/cities')->with('success', 'City removed successfully');
    }

    public function edit(City $city)
    {
        $districts = District::where('status', '1')->get();
        return view('cities.edit', compact('city', 'districts'));
    }

    public function create()
    {
        $districts = District::where('status', '1')->get();
        return view('cities.create', compact('districts'));
    }
}
