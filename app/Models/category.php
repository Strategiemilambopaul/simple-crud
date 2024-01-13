<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['titre','content'];
    public function article()
    {
        $this->hasMany(article::class,'category_id');
    }
}
