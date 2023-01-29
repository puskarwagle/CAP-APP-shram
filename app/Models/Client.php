<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'name_en','name_np','status','app_id',
    ];
    public function app(){
        return $this->belongsTo(App::class,'app_id','id');
    }
 

}
