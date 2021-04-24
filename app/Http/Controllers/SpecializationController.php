<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Vertical;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $specializations = Specialization::all();

            return DataTables::of($specializations)
                ->addColumn('actions', function ($specialization) {
                    return '';
                })
                ->addColumn('verticals', function ($specialization) {
                    $output = '';
                    foreach ($specialization->verticals as $vertical) {
                        $output .= '
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                            '.$vertical->title.'
                        </span>
                        ';
                    }
                    return $output;
                })
                ->addColumn('icon', function ($specialization) {
                    return '<image src="'.asset("/storage"). '/'. $specialization->icon.'" class="h-20" />';
                })
                ->rawColumns(['action','icon','verticals'])
                ->make('true');
        }

        return view('specializations.index');
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
            'icon'  => 'required|image|mimes:png,jpg,svg',
            'verticals' =>'required'

        ]);

        $image = $request->file('icon');
        $fileName   = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
        $typeimage = $image->storeAs('specializations', $fileName);

        $img = Image::make($image->getRealPath());
        $img->fit(500, 500);
        $img->stream();

        Storage::put('specializations/'.$fileName, $img, 'public');

        $specialization = Specialization::create([
                'title' => $request->title,
                'icon' => $typeimage,
                'description' => $request->description,
                'status' => $request->status
        ]);

        $verticals = Vertical::find($request->verticals);
        $specialization->verticals()->sync($verticals);



        return redirect('/specializations')->with('success', 'Specialization added successfully');
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
    public function update(Request $request, Specialization $specialization)
    {
        request()->validate([

            'title' =>'required',
            'verticals' =>'required'
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $fileName   = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $typeimage = $image->storeAs('specializations', $fileName);

            $img = Image::make($image->getRealPath());
            $img->fit(500, 500);
            $img->stream();

            Storage::put('specializations/'.$fileName, $img, 'public');
        } else {
            $typeimage = $specialization->icon;
        }

        $specialization->update([
                'title' => $request->title,
                'icon' => $typeimage,
                'description' => $request->description,
                'status' => $request->status
        ]);

        $verticals = Vertical::find($request->verticals);
        $specialization->verticals()->sync($verticals);

        return redirect('/specializations')->with('success', 'Specialization updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        $specialization->delete();

        return redirect('/specializations')->with('success', 'Specialization removed successfully');
    }

    public function edit(Specialization $specialization)
    {
        $verticals = Vertical::where('status', '1')->get();

        $specialization_verticals = array();

        foreach ($specialization->verticals as $sv) {
            array_push($specialization_verticals, $sv->id);
        }

        return view('specializations.edit', compact('specialization', 'verticals', 'specialization_verticals'));
    }

    public function create()
    {
        $verticals = Vertical::where('status', '1')->get();
        return view('specializations.create', compact('verticals'));
    }
}
