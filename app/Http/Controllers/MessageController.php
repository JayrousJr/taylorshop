<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\Messagerequest;
use App\Mail\Message as MailMessage;
use App\Mail\MessageReceived;
use App\Mail\MessageSent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
     function send(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50|min:5',
            'email' => 'required|email|min:3|max:255',
            'phone' => 'required|string|min:10',
            'subject' => 'required|string|min:5|max:255',
            'message' => 'required|string|min:10|max:500',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('contact#contact')->withErrors($validator)->withInput();
        } 
                $data = new Message();
                $data->name = $request->input('name');
                $data->subject = $request->input('subject');
                $data->phone = $request->input('phone');
                $data->email = $request->input('email');
                $data->subject = htmlspecialchars($request->input('subject'));
                $data->message = htmlspecialchars($request->input('message'));
                $data->save();
                
                $mailto = 'info@tnafricanstore.com';
            // Mail::to($data->email)->send(new MessageSent($data));
            // Mail::to($mailto)->send(new MessageReceived($data));

            session()->flash('success', 'The message was sent successiful');
            return redirect()->route('contact');
           
    }
    
 
}
// Mail::to($inputs->email)->send(new MessageSent($inputs));
//             Mail::to($mailto)->send(new MessageReceived($inputs));