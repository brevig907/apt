<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * @return $this
     */
    public function meta()
    {
        $img_url  = 'http://d14d0ey1pb5ifb.cloudfront.net/';

        $property = \App\Property::where(['meta_set' => 0, 'status' => '1'])
            ->orderBy('package','DESC')
            ->first();

        $address  = \App\Address::where(['property_id' => $property->property_id])
            ->first();

        $images   = \App\Image::where(['property_id' => $property->property_id])
            ->orderBy('pos', 'ASC')
            ->get();

        return view('dashboard.meta')->with(compact(['property','address','images','img_url']));
    }

    /**
     * update meta data.
     *
     * temporary method while i spec out a better way to do this.
     *
     * @param Request $request
     * @return array|string
     */
    public function postUpdate(Request $request)
    {

        $property_id = $request->input('property_id');
        $image_alt   = $request->input('imgalt');
        $image_clean = $request->input('cleanimagename');

        $meta_title  = $request->input('meta-title');
        $meta_desc   = $request->input('meta-description');

        foreach ($image_clean as $image_id => $value) {
            self::saveCleanImageName($image_id, $value);
        }

        foreach ($image_alt as $image_id => $value) {
            self::saveImageAlt($image_id, $value);
        }

        $Property = \App\Property::findOrFail($property_id);
        $Property->metatitle = $meta_title;
        $Property->metadescription = $meta_desc;
        $Property->meta_set = 1;
        $Property->save();

        return back();
    }

    private static function saveCleanImageName($image_id, $clean)
    {
        if (empty($clean)) return;

        $Image = \App\Image::findOrFail($image_id);

        $Image->cleanimagename = $clean;
        $Image->save();

        return;
    }
    private static function saveImageAlt($image_id, $alt)
    {
        if (empty($alt)) return;

        $Image = \App\Image::findOrFail($image_id);

        $Image->imgalt = $alt;
        $Image->save();

        return;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $test = \App\Property::where(['property_id' => $id, 'status' => '1'])->first();
        return $test;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
