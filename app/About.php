<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class About extends Model
{
    public function scopeGetBasicData($query){
        $columns = Schema::getColumnListing($this->getTable());
         $filtered = array_filter($columns,function($var){
            return str_contains($var,"basic_");
         });
         return $query->select($filtered);
     }

     public function scopeGetData($query){
         $columns = Schema::getColumnListing($this->getTable());
          $filtered = array_filter($columns,function($var){
             return !str_contains($var,"basic_");
          });
          return $query->select($filtered)->where('id','!=',1);
      }
}
