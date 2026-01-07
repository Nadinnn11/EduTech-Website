<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;  


class Course extends Model
{
    protected $fillable = ['title', 'brand_description', 'img', 'description'];
    
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    
   
    protected $casts = [
        
    ];

    
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    
   public function students()
{
    return $this->belongsToMany(User::class);
}
}
