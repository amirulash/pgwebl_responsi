<?php

namespace App\Http\Controllers;

use App\Models\Points;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct()
    {
        $this->point = new Points();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = $this->point->points();

        foreach ($points as $point) {
            $feature[] = [
                "type" => "Feature",
                "geometry" => json_decode($point->geom),
                "properties" => [
                    "id" => $point->id,
                    "name" => $point->name,
                    "description" => $point->description,
                    "image" => $point->image,
                    "created_at" => $point->created_at,
                    "updated_at" => $point->updated_at
                ]
                ];
        }

        return response()->json([
            "type" => "FeatureCollection",
            "features" => $feature,
        ]);


        //dd($points);

        //return response()->json($points);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //memasukkan data ke dalam database
    {
        //validate Request
        $request->validate([
            "name" => "required",
            "geom" => "required",
            "image" => "required:jpg,jpeg,png,tiff,gif|max:10000" //10mb
        ],
        [
            "name.required" => "Name is required",
            "geom.required" => "Geometry is required",
            "image.mines" => "Image must be jpg, jpeg, png, tiff, gif and max 10mb",
            "image.max" => "Image must not exceed 10mb"
        ]
    );


        //dd($data); //untuk mengakhiri script setelahnya

        //create folder images
        if (!is_dir('storage/images')) {
            mkdir('storage/images', 0777);
        }

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_point.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);
        } else {
            $filename = null;
        }

        $data = [
            "name" => $request->name,
            "description" => $request->description,
            "geom" => $request->geom,
            "image" => $filename
        ];

        //create point - ! berfungsi untuk mengembalikan sebagai error jika this->point->create gagal
        if (!$this->point->create($data)) {
            return redirect()->back()->with("error", "Failed to create point");
        };

        //redirect to map
        return redirect()->back()->with("success", "Point created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $point = $this->point->point($id);

        foreach ($point as $point) {
            $feature[] = [
                "type" => "Feature",
                "geometry" => json_decode($point->geom),
                "properties" => [
                    "id" => $point->id,
                    "name" => $point->name,
                    "description" => $point->description,
                    "image" => $point->image,
                    "created_at" => $point->created_at,
                    "updated_at" => $point->updated_at
                ]
                ];
        }

        return response()->json([
            "type" => "FeatureCollection",
            "features" => $feature,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $point = $this->point->find($id);

        $data = [
            "title" => "Edit Point",
            "point" => $point,
            "id" => $id,
        ];
        return view('edit-point', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //validate Request
        $request->validate([
            "name" => "required",
            "geom" => "required",
            "image" => "required:jpg,jpeg,png,tiff,gif|max:10000" //10mb
        ],
        [
            "name.required" => "Name is required",
            "geom.required" => "Geometry is required",
            "image.mines" => "Image must be jpg, jpeg, png, tiff, gif and max 10mb",
            "image.max" => "Image must not exceed 10mb"
        ]
    );


        //dd($data); //untuk mengakhiri script setelahnya

        //create folder images
        if (!is_dir('storage/images')) {
            mkdir('storage/images', 0777);
        }

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_point.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);

            //delete image
            $image_old =$request-> image_old;
            if ($image_old !=null){
                unlink('storage/images/'.$image_old);
            }
        } else {
            $filename = $request->image_old;
        }

        $data = [
            "name" => $request->name,
            "description" => $request->description,
            "geom" => $request->geom,
            "image" => $filename
        ];

        //update point - ! berfungsi untuk mengembalikan sebagai error jika this->point->create gagal
        if (!$this->point->find($id)->update($data)) {
            return redirect()->back()->with("error", "Failed to update point");
        };

        //redirect to map
        return redirect()->back()->with("success", "Point updated successfully");

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get image
        $image = $this->point->find($id)->image;

        //delete image
        if ($image != null) {
            unlink('storage/images/' . $image);
        }

        //delete point
        if (!$this->point->destroy($id)) {
            return redirect()->back()->with("error", "Failed to delete point");
        }

        //redirect to map
        return redirect()->back()->with("success", "Point deleted successfully");
    }
    public function table()
    {
        $points = $this->point->points();

        $data = [
            "title" => "Table Points",
            "points" => $points
        ];

        return view('table-point', $data);
    }
}
