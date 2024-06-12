<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class polylines extends Model
{
    use HasFactory;

    protected $table = 'Jalan_Pacitan';

    protected $guarded = ['id'];
    public function polylines()
    {
        return $this->select(DB::raw('id, geom, namrjl, konrjl, matrjl, fgsrjl, utkrjl, tolrjl, wlyrjl, autrjl, klsrjl, spcrjl, jparjl, arhrjl, starjl, kllrjl, medrjl, locrjl, jarrjl, fcode, remark, srs_id, lcode, metadata, shape_leng, created_at'))->get();
    }
    public function polyline($id)
    {
        return $this->select(DB::raw('id, name, description,image,  ST_AsGeoJSON (geom) as geom, created_at, updated_at'))->where('id', $id)->get();
    }
}

