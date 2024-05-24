<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function getBooks()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth_token'),
            'Content-Type' => 'application/json'
        ])->get(env('API_URL') . 'books');

        if ($response->successful()) {
            $responseData = $response->json();
            return view('books')->with('books', $responseData);
        }
    }

    public function editBook($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth_token'),
            'Content-Type' => 'application/json'
        ])->get(env('API_URL') . 'books/' . $id);

        if ($response->successful()) {
            $responseData = $response->json();
            $autherId = $responseData['author']['id'];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Session::get('auth_token'),
                'Content-Type' => 'application/json'
            ])->get(env('API_URL') . 'authors/' . $autherId);

            if ($response->successful()) {
                $autherData = $response->json();
                $auther_name = $autherData['first_name'] . ' ' . $autherData['last_name'];
            }
            return view('bookpage', ['bookdata' => $responseData, 'auther_name' => $auther_name]);
        }
    }

    public function deleteBook($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth_token'),
            'Content-Type' => 'application/json'
        ])->delete(env('API_URL') . 'books/' . $id);

        if ($response->successful()) {
            return redirect()->back();
        }
    }

    public function getCreateBook()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . Session::get('auth_token'),
            'Content-Type' => 'application/json'
        ])->get(env('API_URL') . 'authors');



        if ($response->successful()) {
            $responseData = $response->json();
            return view('createbookpage')->with('authers', $responseData);
        }
    }

    public function postCreateBook(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'isbn' => 'required',
            'format' => 'required',
            'number_of_pages' => 'required',
        ]);

        $dateTime = isset($input['release_date']) ? Carbon::createFromFormat('Y-m-d\TH:i', $input['release_date']) : NULL;
        $data = [
            "author" => [
                "id" => $input['author']
            ],
            "title" => $input['title'],
            "release_date" => $dateTime->toAtomString(),
            "description" => $input['description'],
            "isbn" => $input['isbn'],
            "format" => $input['format'],
            "number_of_pages" => (int) $input['number_of_pages'],
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . Session::get('auth_token'),
        ])->post(env('API_URL') . 'books', $data);
        if ($response->failed()) {
            $data = ['message' => $response->body(), 'status' => $response->status()];

            return response()->json($data, $response->status());
        }
        if ($response->successful()) {
            $responsea = Http::withHeaders([
                'Authorization' => 'Bearer ' . Session::get('auth_token'),
                'Content-Type' => 'application/json'
            ])->get(env('API_URL') . 'authors');

            if ($responsea->successful()) {
                $responseData = $responsea->json();
                return view('authers')->with('authers', $responseData);
            }
        }
    }
}
