<?php

namespace App\Http\Controllers;

use App\Events\receiveTestEmail;
use Illuminate\Http\Request;

class emailTestController extends Controller
{
    public function index()
    {
        return view('email');
    }

    public function testEmail(Request $request)
    {
        receiveTestEmail::dispatch($request->email);
        return redirect('/emailTest');
    }
}
