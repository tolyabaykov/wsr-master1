<?php

namespace App\Http\Controllers;

use App\Events;
use App\Message;
use App\Theme;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return Message::all();
    }

    // Вывод сообщений
    public function showMessages(Request $request, $id){
        $theme = Theme::find($id);
        $messages = $theme->messages()->paginate(5);
        if ($request->ajax()) {
            return view('messages', compact('messages'));
        }
        return view('theme', ['theme' =>$theme, 'messages' => $messages]);

    }


    // Вывод сообщений для ajax
    public function ajaxMessages(Request $request, $id){
        $theme = Theme::find($id);;
        $messages = $theme->messages()->paginate(5);
            return ($messages);
    }


    public function store(Request $request)
    {
        Message::create([
                'user_id' => auth()->user()->id
            ] + $request->all());
        $messages = Theme::find($request->theme_id)->messages()->paginate(5);
        return view('messages', ['messages' =>$messages]);

    }

    public function show(Message $message)
    {
        return view('showMessage', ['message' => $message]);
    }


        public function update( $id, Request $request)
    {
        $messege = Message::find($id);
        $messege ->fill($request->all());
        $messege->save();
        return back();
    }


    public function destroy(Message $message)
    {
        return $message->delete();
    }


}
