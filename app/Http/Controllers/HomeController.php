<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fungsi ini akan memanggil view yang Anda simpan di resources/views/welcome.blade.php
        return view('welcome'); 
    }
}