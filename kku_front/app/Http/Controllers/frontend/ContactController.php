<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailMessage;

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
            'tel' => [
                'required',
                'string',
                'regex:/^[0-9]{10}$/', // ตรวจสอบให้เบอร์มีแค่ตัวเลขและมีความยาว 10 หลักเท่านั้น
            ],
            'message' => 'required|string',
        ]);
    
        // Create the message entry
        Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('tel'),
            'message' => $request->input('message'),
        ]);

        $infos = $this->getWebInfo('', );
        $webInfo = $this->infoSetting($infos);
        Mail::to($request->input('email'))->send(new SendMailMessage($webInfo, $request->input('name')));
    
        // Redirect back with success message
        return redirect()->route('contact.index')->with('message', 'save message successfully');
    }
}
