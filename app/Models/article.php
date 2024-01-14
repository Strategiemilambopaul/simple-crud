<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $fillable=['nom','content','category_id','photo_path'];

    public function category()
    {
        return $this->belongsTo(category::class,'category_id');
    }
}
