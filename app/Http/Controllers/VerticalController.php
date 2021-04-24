<?php

namespace App\Http\Controllers;

use App\Models\Vertical;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use DataTables;

class VerticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $verticals = Vertical::latest()->get();

        if ($request->ajax()) {
            $verticals = Vertical::all();

            return DataTables::of($verticals)
                ->addColumn('actions', function ($vertical) {
                    return '';
                })
                ->addColumn('icon', function ($vertical) {
                    return '<image src="'.asset("/storage"). '/'. $vertical->icon.'" class="h-20" />';
                })
                ->rawColumns(['action','icon'])
                ->make('true');
        }

        return view('verticals.index', ['verticals' => $verticals]);
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
            'icon'  => 'required|image|mimes:png,jpg,svg'

        ]);

        $image = $request->file('icon');
        $fileName   = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
        $typeimage = $image->storeAs('verticals', $fileName);

        $img = Image::make($image->getRealPath());
        $img->fit(500, 500);
        $img->stream();

        Storage::put('verticals/'.$fileName, $img, 'public');

        Vertical::create([
                'title' => $request->title,
                'icon' => $typeimage,
                'description' => $request->description,
                'status' => $request->status
        ]);


        return redirect('/verticals')->with('success', 'Vertical added successfully');
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
    public function update(Request $request, Vertical $vertical)
    {
        request()->validate([

            'title' =>'required'
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $fileName   = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $typeimage = $image->storeAs('verticals', $fileName);

            $img = Image::make($image->getRealPath());
            $img->fit(500, 500);
            $img->stream();

            Storage::put('verticals/'.$fileName, $img, 'public');
        } else {
            $typeimage = $vertical->icon;
        }

        $vertical->update([
                'title' => $request->title,
                'icon' => $typeimage,
                'description' => $request->description,
                'status' => $request->status
        ]);


        return redirect('/verticals')->with('success', 'Vertical updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vertical $vertical)
    {
        $vertical->delete();

        return redirect('/verticals')->with('success', 'Vertical removed successfully');
    }

    public function edit(Vertical $vertical)
    {
        return view('verticals.edit', ['vertical' => $vertical]);
    }

    public function create()
    {
        return view('verticals.create');
    }
}
