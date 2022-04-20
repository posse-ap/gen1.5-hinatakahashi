<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'studies';
    protected $dates = ['study_date'];
    public function studies()
    {
        return $this->belongsTo('App\Language');
        return $this->belongsTo('App\Content');
    }
}
