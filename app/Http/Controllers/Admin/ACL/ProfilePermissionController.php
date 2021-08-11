<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilePermissionController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function profiles($idPermission)
    {
        
        $permission = $this->permission->find($idPermission);
        //dd($permission->name);

        if(!$permission)
            return redirect()->back();

            $profiles = $permission->profiles()->paginate();

            return view('admin.pages.permissions.profiles.profiles', compact('profiles', 'permission'));
    }

    public function permissionsAvailable(Request $request, $idPermission)
    {
        if(!$permission = $this->permission->find($idPermission))
            return redirect()->back();

           
        $filters = $request->except('_token');

        $profiles = $permission->profilesAvailable($request->filter);
        
        return view('admin.pages.permissions.profiles.available', compact('profiles', 'permission', 'filters'));
    }

    public function attachProfilePermissions(Request $request, $idPermission)
    {
        if(!$permission = $this->permission->find($idPermission))
            return redirect()->back();

        if(!$request->profiles || count($request->profiles) == 0)
        {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma opção!');
        }
        $permission->profiles()->attach($request->profiles);

        return redirect()->route('permissions.profiles', $permission->id);
    }

    public function detachProfilePermission($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if(!$profile || !$permission)
            return redirect()->back();
        
        $permission->profiles()->detach($profile);
        
        return redirect()->route('permissions.profiles', $permission->id);
    }

}
