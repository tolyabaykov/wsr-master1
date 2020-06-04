<?php

namespace App\Http\Controllers;

use App\Events;
use App\Notifications\NotiToAddManager;
use App\Notifications\NotiToDeleteManager;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $user)
    {
        $events = Events::all();
        $events = $events->sortBy('date');
        $users = User::all();
        //      $events = DB::table('events')->get(); //Это второй способ обращения к базе данных. В этом случае добавляем: use Illuminate\Support\Facades\DB;
        return view('admin.index', ['events' => $events, 'users' => $users ]);
    }

    public function store(Request $request)
    {
        Events::create($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        Events::destroy($id);
        return back();
    }

    public function update_all(Request $request)
    {
        $events = Events::all();
        foreach ($events as $event) {
            if ($request->has($event->id)) {
                $data = Events::find($event->id);
                $data->manager = $request->input($event->id);
                $data->save();
            }
//            уведомления на добавление и удаление менеджера
            $users = User::all();
            foreach ($users as $user) {
                if ($user->id ==  $event->manager){
                    $user->notify(new NotiToAddManager($user));
                    $user->notify(new NotiToDeleteManager($user));
                }

        }
//            foreach ($users as $user){
//                if ($user->id==$event->manager){
//                    $user->notify(new NotiToDeleteManager($user));
//                }
//            }
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $event = Events::find($id);
        $event ->fill($request->all());
        $event->save();

//            уведомления на добавление и удаление менеджера
        $users = User::all();
        foreach ($users as $user) {
            if ($user->id ==  $event->manager){
                $user->notify(new NotiToAddManager($user));
                $user->notify(new NotiToDeleteManager($user));
                return back();
            }

        }
//        foreach ($users as $user){
//            if ($user->id == $event->manager){
//                $user->notify(new NotiToDeleteManager($user));
//            }
//        }
    }



}
