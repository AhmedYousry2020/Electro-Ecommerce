<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class UserAddress extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'location_country',
        'address',
        'zip_code'
    ];
    public function user(){

        return $this->belongsTo(User::class);
    }
}
