<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function create()
    {

        return view('email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
          'suggestion' => 'required',
        ]);

        $data = [
          'email' => $request->email,
          'suggestion' => $request->suggestion,
        ];

        $files = $request->files;

        Mail::send('email-template', $data, function($message) use ($data, $files) {
            $message->to('scm.sulaemon@gmail.com')
            ->subject('Hello');

           
                foreach($files as $file) {
                    $message->attach($file->getRealPath(), array(
                        'as' => $file->getClientOriginalName(), // If you want you can change original name to custom name      
                        'mime' => $file->getMimeType())
                    );
                }
            
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}
