<?php

namespace App\Http\Controllers;

use App\Models\District;
use DataTables;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $districts = District::all();

            return DataTables::of($districts)
                ->addColumn('actions', function ($district) {
                    return '';
                })
                ->rawColumns(['action','icon'])
                ->make('true');
        }

        return view('districts.index');
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

            'title' =>'required'

        ], [
            'title.required' => 'The district name field required'
        ]);

        District::create([
                'title' => $request->title,
                'status' => $request->status
        ]);


        return redirect('/service-areas')->with('success', 'Area added successfully');
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
    public function update(Request $request, $id)
    {
        request()->validate([

            'title' =>'required'

        ], [
            'title.required' => 'The district name field required'
        ]);
        $district = District::findOrFail($id);

        $district->update([
                'title' => $request->title,
                'status' => $request->status
        ]);


        return redirect('/service-areas')->with('success', 'Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();

        return redirect('/service-areas')->with('success', 'Area removed successfully');
    }

    public function edit($id)
    {
        $district = District::findOrFail($id);
        return view('districts.edit', ['district' => $district]);
    }

    public function create()
    {
        return view('districts.create');
    }
}
