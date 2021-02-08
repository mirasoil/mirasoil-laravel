<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('/'.'/#footer-section');
    }

    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect()->to('/')->with('subscribe-success', 'Ai fost abonat cu succes!');
        }
        return redirect()->to('/')->with('subscribe-failure', 'Se pare ca adresa introdusa este deja abonata.');
            
    }
}
