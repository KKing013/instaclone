<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profileImage () 
    {
        $imagePath = ($this->image) ? $this->image : '/profile/noimage.jpg';


        return '/storage/' . $imagePath;

    }


    public function user()
    {

        return $this->belongsTo(User::class);
    
    }

    public function followers () {
        
        return $this->belongsToMany(User::class);
    }

    






}
