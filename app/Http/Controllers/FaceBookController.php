<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller
{
    /**
 * Login Using Facebook
 */
 public function redirect()
 {
    return Socialite::driver('facebook')->redirect();
 }

 public function callbackFacebook()
 {
  try {

    $facebook_user = Socialite::driver('facebook')->user();
    $user = User::where('facebook_id', $facebook_user->getId())->first();

    if(!$user){
        $new_user = User::create([
            'name' => $facebook_user->getName(),
            'email' => $facebook_user->getEmail(),
            'facebook_id' => $facebook_user->getId(),
        ]);

        Auth::login($new_user);

        return redirect()->intended('dashboard');
    }
    else{
        Auth::login($user);
        return redirect()->intended('dashboard');
    }
       } catch(\Throwable $th){
        dd('Ocorreu um erro'. $th->getMessage());
    }
   }

}
