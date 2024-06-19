<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCreation extends Model
{
    use HasFactory;
    protected $fillable=['club_id','title','product_title','type'];
}
