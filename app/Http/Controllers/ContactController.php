<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::with(['condition','design'])
        ->where('status',1)
        ->orderByDesc('created_at')
        ->get();

        return view('contacts.index',compact('contacts'));
    }
}
