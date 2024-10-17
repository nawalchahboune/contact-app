<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\SimpleSoftDeltingScope;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    // public function attributes(){
    //     return ['company_id'=>'company'];
    // } 
    public function company(){
        return $this->belongsTo(Company::class);
    }
    // protected static function boot(){
    //     static::addGlobalScope(new SimpleSoftDeltingScope());

    // }
    public function scopeonlyTrashed(Builder $query){
        if($trash=request()->query('trash')){
                
            $query->onlyTrashed();
        }
        return $query;
    }
    public function scopeFilterByCompany(Builder $query, $company_id){
        if($company_id){
            $query->where("company_id",$company_id);
        }
        return $query;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
