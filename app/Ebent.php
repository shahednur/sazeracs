<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebent extends Model
{
    protected $fillable = [
        'title','description','address','lat','long','start_date','end_date','user_id'];
    protected $table = 'ebents';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function creator(){
        return $this->belongsTo(User::class,'user_id');
    }
}
