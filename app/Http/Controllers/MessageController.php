<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\Messagerequest;
use App\Mail\Message as MailMessage;
use App\Mail\MessageReceived;
use App\Mail\MessageSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    function send(Messagerequest $request)
    {
        try {
            $validateData = $request->validated();

            $inputs = new Message([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'phone' => $validateData['phone'],
                'subject' => $validateData['subject'],
                'message' => $validateData['message'],
            ]);
            $inputs->save();
            $mailto = 'info@tnafricanstore.com';
            Mail::to($inputs->email)->send(new MessageSent($inputs));
            Mail::to($mailto)->send(new MessageReceived($inputs));

            session()->flash('success', 'The message was sent successiful');
            return redirect()->route('contact');
        } catch (ValidationException $e) {
            return redirect()->route('contact')->withErrors($e->validator)->withInput();
        }
    }
}
