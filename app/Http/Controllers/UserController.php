<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\country;
use App\User;
use App\friend;
use App\user_favorite;
use Image;
use File;

class UserController extends Controller
{
    
    public function showprofile(){
        $user = Auth::user();
        return view('auth/profile');
    }
    
    
    public function udpateprofile(Request $request){
        
        $user = Auth::user();
        $user->update($request->all());
        
        return view('auth/profile');
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
    
    public function deletefriend_byid(Request $request){
      $user = Auth::user();
      $friend = friend::where('user_friend_id',$request->id)->where('user_id',$user->id);
      $friend->delete();
    }
    
    public function userprofile_byid($id){
         return view('users/profile',[
            'user' => User::find($id),
        ]);
    }
    
    public function addfavorite(Request $request){
        $user = Auth::user();
        $favorite = new user_favorite;
        $favorite->user_id = $user->id;
        $favorite->attraction_id = $request->id;
        $favorite->save();
    }
    
     public function delfavorite(Request $request){
        $user = Auth::user();
        $favorite = user_favorite::where('user_id',$user->id)->where('attraction_id',$request->id)->delete();
    }
}
