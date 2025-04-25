<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'qty',
        'price',
        'description',
        'bio'
    ];

    public static $rules = [
        'name' => 'required|string|max:255|unique:products,name',
        'qty' => 'required|numeric|min:0',
        'price' => 'required|decimal:0,2',
        'description' => 'nullable|string',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    
    

}