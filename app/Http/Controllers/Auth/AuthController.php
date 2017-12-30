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
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

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
            
        ]);
    }
    
    
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
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

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
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
    
    public function redirectToProviderTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallbackTwitter()
    {
        try
        {
            $socialUser = Socialite::driver('twitter')->user();
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
                'provider' => 'twitter',
                'profile_phote_path' => $file,
            ]);
            auth()->login($newUser);
        }else{
            auth()->login($user);
        }
        return redirect('/')->with(['success' => 'You have successfully logged in']);
    }
    
    
    
    
}
