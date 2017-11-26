<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\list_countries;
use App\User;
use Image;
use File;

class UserController extends Controller
{
    
    public function showprofile(){
        
        return view('auth/profile',[
            'countries' => list_countries::all(),
        ]);
    }
    
    
    public function udpateprofile(Request $request){
        
        $user = Auth::user();
        
        $user->update($request->all());
        
        return view('auth/profile',[
            'countries' => list_countries::all(),
        ]);
    }
    
    public function changepassword(Request $request){
        
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
        
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            //Change the password
            $user->fill(['password' => Hash::make($request->password)])->save();
 
            return redirect()->back()->with(['success' => 'Your password has been changed']);
        }
        return redirect()->back()->with(['error' => 'Your password has been not changed']);
    }
    
    public function changephoto(Request $request){
        
        $user = User::find(Auth::id());

        if($request->hasFile('profile_phote_path')){
            $oldimage = $user->profile_phote_path;
    		$avatar = $request->file('profile_phote_path');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/user-photos/' . $filename ) );
    	
    		$user->profile_phote_path = $filename;
    		$user->save();
    		File::delete(public_path('/uploads/user-photos/' . $oldimage ));
    	}
        
        return redirect()->back()->with(['success' => 'Your photo has been changed']);
    }
    
}
