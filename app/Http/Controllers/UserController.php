<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class UserController extends Controller
{
    //menampilkan index
    public function index(){
        return view('pages.login');
    }

    public function dashboard(){
        return view('pages.dashboard');
    }

    public function signup(){
        return view('pages.signup');
    }

    // Get User
    public function getUser(){
        // $user = User::All();
        // return view('pages.dashboard')->with('user', $user);

        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('GET','http://localhost:8080/test/api/users');
        $hasil = $result->getBody();
        $decode = json_decode($hasil, true);

        return view('pages.dashboard')->with('users', $decode);
    }

    // Create User
    public function create(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');

        $body = array();
            $body['userName'] = $username;
            $body['password'] = $password;
            $body['firstName'] = $firstname;
            $body['lastName'] = $lastname;

        $client = new Client(); 
        $response = $client->post('http://localhost:8080/test/api/users', [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($body)
        ]);

        return redirect('/dashboard');        
    }
    

    public function update(Request $request){
        $id = $request->input('id');
        $username = $request->input('username');
        $password = $request->input('password');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');

        $body = array();
            $body['id'] = $id;
            $body['userName'] = $username;
            $body['password'] = $password;
            $body['firstName'] = $firstname;
            $body['lastName'] = $lastname;

        $client = new Client(); 
        $response = $client->put('http://localhost:8080/test/api/users', [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($body)
        ]);

        return redirect('/dashboard');        
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $client = new Client(); 
        $response = $client->delete("http://localhost:8080/test/api/users/{$id}");
        return redirect('/dashboard');     
    }

    // Json test
    public function jsontest(){
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('GET','http://localhost:8080/test/api/users');
        $hasil = $result->getBody();
        $decode = json_decode($hasil, true);
        // echo $hasil;
        // print_r($decode);

        return view('pages.test')->with('users', $decode);
    }

  
}