<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
   public function Login(Request $request)
   {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $input = $request->all();

        $response = \Http::post(env('API_URL').'token', [
            'email' => $input['email'],
            'password' => $input['password'],
        ]);
        if($response->successful())
        {
            $responseData = $response->json();

            \DB::table('users')->updateOrInsert([
                'name' => $responseData['user']['first_name'].' '. $responseData['user']['last_name'],
                'email' => $responseData['user']['email'],
                'password' => $responseData['token_key'],
            ],
            );

           $user_id =  \DB::table('users')->where('email',$responseData['user']['email'])->first()?->id;

            \DB::table('royal_app_tokens')->insert([
                'user_id' =>  $user_id,
                'token_id' =>  $responseData['id'],
                'token_key' => $responseData['token_key'],
                'refresh_token_key' => $responseData['refresh_token_key'],
                'expires_at' =>  $responseData['expires_at'],
                'refresh_expires_at' => $responseData['refresh_expires_at'],
                'last_active_date' => $responseData['last_active_date'],
            ]);

            Session::put('auth_token',$responseData['token_key']);
            Session::put('user_name',$responseData['user']['first_name'].' '. $responseData['user']['last_name']);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$responseData['token_key'],
                'Content-Type' => 'application/json'
            ])->get(env('API_URL').'authors');

            if($response->successful())
            {
                $responseData = $response->json();
                return redirect('authers')->with('authers',$responseData);
            }
            
        }
        else
        {
            return redirect('/')->with('error-message','Wrong email or password!');
        }
   }
}
