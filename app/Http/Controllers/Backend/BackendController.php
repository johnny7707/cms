<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class BackendController extends Controller
{
    protected $limit = 15;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check-permissions');
    }

    public function getMessages(){

        $messages = Message::all();

        return view('backend.message.index');
    }
}
