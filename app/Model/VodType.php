<?php

namespace App\Model;

class VodType extends Model
{

    protected ?string $table = "vod_type";

    public function children(){
        return $this->hasMany(VodType::class,"parent_id","id");
    }
    public function parent(){
        return $this->belongsTo(VodType::class,"parent_id","id");
    }

    
}
