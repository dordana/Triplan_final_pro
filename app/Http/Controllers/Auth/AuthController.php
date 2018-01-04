<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Image;
class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'lastname' => $data['lastname'],
            'age' => $data['age'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'country' => $data['country'],
            'city' => $data['city']
            
        ]);
    }
    
    
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try
        {
            $socialUser = Socialite::driver('facebook')->user();
        }
        catch (\Exception $e)
        {
            return redirect('/');
        }
        $user = User::where('provider_id',$socialUser->getId())->first();
        if(!$user)
        {
            $tempUser = User::where('email',$socialUser->getEmail())->first();
            if($tempUser)
            {
                return back()->with(['errorform' => 'There is already a user with this email. please try another']);
            }
            $arrContextOptions=['ssl'=>['verify_peer'=>false,'verify_peer_name'=>false]];
            
            $id = $socialUser->getId();
            $fbUrl = 'https://graph.facebook.com/v2.8/'.$socialUser->id.'/picture?height=500';
            $file = $id.'.jpg';
            Image::make(file_get_contents($fbUrl, false, stream_context_create($arrContextOptions)))->save(public_path('uploads/user-photos/'.$file));
            
            
            $newUser = User::create([
               'provider_id' => $socialUser->getId(),
                'firstname' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => 'facebook',
                'profile_phote_path' => $file,
            ]);
            
            auth()->login($newUser);
        }else{
            auth()->login($user);
        }
        return redirect('/')->with(['success' => 'You have successfully logged in']);
        
    }
    
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        try
        {
            $socialUser = Socialite::driver('google')->stateless()->user();
        }
        catch (\Exception $e)
        {
            return redirect('/');
        }
        $user = User::where('provider_id',$socialUser->getId())->first();
        if(!$user)
        {
            $tempUser = User::where('email',$socialUser->getEmail())->first();
            if($tempUser)
            {
                return redirect('/login')->with(['errorform' => 'There is already a user with this email. please try another']);
            }
            $arrContextOptions=['ssl'=>['verify_peer'=>false,'verify_peer_name'=>false]];
            
            $id = $socialUser->getId();
            $fbUrl = $socialUser->getAvatar();
            $file = $id.'.jpg';
            Image::make(file_get_contents($fbUrl, false, stream_context_create($arrContextOptions)))->save(public_path('uploads/user-photos/'.$file));
            
            
            $newUser = User::create([
               'provider_id' => $socialUser->getId(),
                'firstname' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => 'google',
                'profile_phote_path' => $file,
            ]);
            auth()->login($newUser);
        }else{
            auth()->login($user);
        }
        return redirect('/')->with(['success' => 'You have successfully logged in']);
    }
}
