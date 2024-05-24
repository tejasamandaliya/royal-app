<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    public function getAuthors()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('auth_token'),
            'Content-Type' => 'application/json'
        ])->get(env('API_URL').'authors');
    
        if($response->successful())
        {
            $responseData = $response->json();
            return view('authers')->with('authers',$responseData);
        }
    }

    public function editAuthor($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('auth_token'),
            'Content-Type' => 'application/json'
        ])->get(env('API_URL').'authors/'.$id);
    
        if($response->successful())
        {
            $responseData = $response->json();
            return view('autherpage')->with('autherdata',$responseData);
        }
    }

    public function deleteAuthor($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('auth_token'),
            'Content-Type' => 'application/json'
        ])->delete(env('API_URL').'authors/'.$id);
    
        if($response->successful())
        {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.Session::get('auth_token'),
                'Content-Type' => 'application/json'
            ])->get(env('API_URL').'authors');
        
            if($response->successful())
            {
                $responseData = $response->json();
                return view('authers')->with('authers',$responseData);
            }
        }
    }
}
