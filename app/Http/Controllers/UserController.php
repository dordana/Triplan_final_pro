<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\country;
use App\Attraction;
use App\User;
use App\friend;
use App\Path;
use App\user_favorite;
use Image;
use File;
use Mail;
use GuzzleHttp\Client;

class UserController extends Controller
{
    
    public function showprofile(){
        $user = Auth::user();
        return view('auth/profile',[
            'user' => $user
            ]);
    }
    public function showuserfavopage(){
        $user = Auth::user();
        $userArray = $user->favorites;
        
        $userAttractions = [];
        foreach($userArray as $row){
            array_push($userAttractions,Attraction::find($row->attraction_id));
        }
        // 
        // $client = new Client();
        // $res = $client->request('GET', 'http://engine.hotellook.com/api/v2/lookup.json?query=Tel%20Aviv&lang=IL&lookFor=hotel&limit=10&token=9340bbb2f4f38e75ed742b62e8350482');
        // echo $res->getBody();
        // return;
        // 
        return view('auth/userfavorites',[
            'userAttractions' => $userAttractions,
            
            ]);
    }
    
    public function updateprofile(Request $request){
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
    
    public function deletepath_byid(Request $request){
      $path = Path::find($request->id);
      $path->delete();
    }
    
    public function sharepath_byid(Request $request){
      $path = Path::find($request->id);
      if($path->shared == "1"){
          $path->shared = "0";
      }else{
          $path->shared = "1";
      }
      $path->update();
    }
    
     public function sendMsgFriend(Request $request){
      $sender = $user = Auth::user();
      $toSend = User::find($request->userId);
      $data = array('name' => $sender->username,'userid' => $sender->id, 'newUserid' => $toSend->username, 'subject' => $request->title, 'data' => $request->data);
            Mail::send('email-templates/friendMsg', $data, function ($message) use ($sender,$toSend) {

                $message->from($sender->email, 'Triplan');
                $message->to($toSend->email)->subject('You got a new message from '. $sender->username);
            });
            
        return redirect()->back();
    }
    
    public function userprofile_byid($id){
        $user = Auth::user();
        $userFriends = [];
        if($user){
            
            $userArrayFriends = $user->friends;
            for($i = 0 ; $i < count($userArrayFriends) ; $i++){
                array_push($userFriends,$userArrayFriends[$i]->user_friend_id);
            }
        }
        return view('users/profile',[
            'user' => User::find($id),
            'userFriends' => $userFriends,
        ]);
    }
    
    public function showfriends(){
        return view('users/users',[
            'user' => Auth::user(),
            'users' => User::all(),
        ]);
        
        
    }
    
    public function addfriend_byid(Request $request){
      $user = Auth::user();
      $friend = new friend;
      $friend->user_id = $user->id;
      $friend->user_friend_id = $request->id;
      $friend->save();
      return $friend;
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
