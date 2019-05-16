<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
  protected $fillable = ['name', 'phone', 'email', 'message'];
  public function submit(Request $request){

      $this->validate($request, [
          'name'  => 'required',
          'phone' => 'required',
          'email' => 'required',
          'message' => 'required'
      ]);

      // Create New Message
      $message = new Message;

      $message->name  = $request->input('name');
      $message->phone = $request->input('phone');
      $message->email = $request->input('email');
      $message->message = $request->input('message');

      /// Save Message
      $message->save();

      /// Redirect
      return redirect('/blog/contact')->with('success', 'Your message was successfully sent. Thank you for your pay attention with us.');
  }

  public function getMessages(){
      $messages = Message::all();

      return view('backend.message')->with('messages', $messages);
  }
}
