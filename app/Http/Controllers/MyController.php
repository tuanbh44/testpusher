<?php

namespace App\Http\Controllers;

use App\Events\AloneEvent;
use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class MyController extends Controller
{
    public function getFrontend() {
        $videoComments = Youtube::getCommentThreadsByVideoId('pDE2AwToFNc');

        return view('welcome',['videoComments' => $videoComments]);
    }

    public function sent(Request $request) {
        $message = $request->query->get('message', 'Hello world!');
        event(new AloneEvent($message));

        return "Message \" $message \" has been sent. ";
    }
}
