<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class SiswaController extends Controller
{
    //menampilkan index
    public function index(){
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('GET','http://localhost:8080/test/api/users');
        $hasil = $result->getBody();

        echo $hasil;

        // return Siswa::all();
    }

    public function create(request $request){
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        
        $siswa->save();

        return "Simpen data cuy";

    }

    public function update(request $request, $id){
        $nama = $request->nama;
        $alamat = $request->alamat;

        $siswa = Siswa::find($id);
        $siswa->nama = $nama;
        $siswa->alamat = $alamat;
        
        $siswa->save();

        return "Update data cuy";
    }

    public function delete($id){
        $siswa = Siswa::find($id);
        $siswa->delete();

        return "Delete data cuy";
    }

}
