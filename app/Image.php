<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public $timestamps = true;

    protected $fillable = ['name', 'hash'];


    public function incident()
    {
        return $this->belongsTo(Incident::class, 'incident_id');
    }

}
