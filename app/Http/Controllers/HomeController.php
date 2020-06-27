<?php

namespace App\Http\Controllers;

use App\Events;
use App\Message;
use App\Notifications\AddToClosedTheme;
use App\Notifications\NotiToAddManager;
use App\Roles;
use App\Status;
use App\Theme;
use App\User;
use App\theme_access;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        $events = Events::all();
        $events = $events->sortBy('date');
        $users = User::all();
        $statuses = Status::all();
        $roles = Roles::all();
        $themes = Theme::all();
        $theme_accesses=DB::table('theme_accesses')->get();
        $access=array();

        foreach ($theme_accesses as $theme_access){
            $access=array_merge($access, array($theme_access->user_id));
        }
        //      $events = DB::table('events')->get(); //Это второй способ обращения к базе данных. В этом случае добавляем: use Illuminate\Support\Facades\DB;
        return view('home', ['events' => $events, 'users' => $users, 'statuses' => $statuses, 'roles' => $roles, 'themes' => $themes, 'theme_accesses'=> $theme_accesses]);
    }

//создание event
    public function store(Request $request, $id)
    {
        $user_id = $request->input('user_id');

        $users=User::all();
        $events = Events::find($id); //Почему то без этого не работает
        $thema=$events->themes()->create(
            array_merge(
                [
                    'owner_id' => auth()->user()->id,
                    'events_id' => $events->id,
                ],
                $request->all()
            )
        );

        if($request->status==3){
            if(count($user_id)!=0){
                foreach ($users as $user) {
                    $i=0;
                    while ($i!=count($user_id)) {
                        if ($user->id == $user_id[$i]) {
                            theme_access::create([
                                'user_id' => $user_id[$i],
                                'theme_id' => $thema->id,
                            ]);
                            $user->notify(new AddToClosedTheme($user));
                        }
                        $i=$i+1;
                    }
                }
            }

        }


        return redirect()->back();

    }
// Вывод сообщений
    public function showMessages(Request $request, $id){
        $theme = Theme::find($id);;
        $messages = $theme->messages()->paginate(5);
        if ($request->ajax()) {
            return view('messages', compact('messages'));
        }
        return view('theme', ['theme' =>$theme, 'messages' => $messages]);
 }
}
