<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    
     /**
     * Get Profiles
     */

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

        /**
     * Get Permissions não listadas para o perfil 
     */
    public function profilesAvailable($filter = null)
    {
       $profiles = profile::whereNotIn('profiles.id', function($query) {
           $query->select('permission_profile.profile_id');
           $query->from('permission_profile');
           $query->whereRaw("permission_profile.profile_id={$this->id}");
       })
           ->where(function ($queryFilter) use ($filter){
               if($filter)
               $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
           })
           ->paginate();
           //dd($profiles);
           return $profiles;
    }
}
