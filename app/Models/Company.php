<?php

namespace App\Models;

use App\Models\Scopes\SimpleSoftDeltingScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function contacts(){
        return $this->hasMany(Contact::class);
    }
    protected static function booted(){
        static::addGlobalScope("scopeTest", new SimpleSoftDeltingScope);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
