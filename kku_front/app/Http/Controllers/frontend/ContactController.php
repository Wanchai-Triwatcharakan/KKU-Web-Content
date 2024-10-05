<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Post;

class ContactController extends Controller
{
    //
    public function indexPageContact() {
        $location = Post::where('id', 12)->first();
        return view('frontend.pages.contact.contact', compact('location'));
    }

    public function createNewLetter(Request $request) {
        // Validate the request first to ensure all required fields are filled
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tel' => 'required|string',
            'message' => 'required|string',
        ]);
    
        // Create the message entry
        Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('tel'),
            'message' => $request->input('message'),
        ]);
    
        // Redirect back with success message
        return redirect()->route('contact.index')->with('message', 'save message successfully');
    }
}
