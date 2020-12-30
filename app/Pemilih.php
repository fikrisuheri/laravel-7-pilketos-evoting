<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    protected $table = 'pemilih';
    protected $fillable = ['npm','password','status','kandidat_id','fakultas','jurusan','name'];
}
