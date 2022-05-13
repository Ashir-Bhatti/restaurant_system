<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resturent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestNotification;

class UserController extends Controller
{

    public function index()
    {
        $user = User::where('id', '!=', auth()->id())->get();

        return view('user.index',compact('user'));
    }

    public function create()
    {
        $resturent = Resturent::where('user_id',Auth::id())->first();
        if($resturent)
        {
            return view('user.create');
        }
        else{
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= Hash::make($request->password);
        $user->save();

		return redirect()->route('user.index')->with('error','hello');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->with('resturents')->first();
        // dd($user);
        $resturent_ids = $user->resturents->pluck('id');

        $resturent = Resturent::where('user_id', Auth::id())
            ->whereNotIn('id', $resturent_ids)
            ->get();
        return view('user.edit', compact('resturent','user'));
        }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $resturants = Resturent::whereIn('id', $request->resturent_id)->get();
        // dd($resturants);
        $user->resturents()->sync($resturants);

        return redirect()->route('user.index');
    }
    public function sendnotification()
    {
        $user = User::first();
        $test_notify = [
            'body' => 'Hello!',
            'text' => 'You have received a Mail',
            'url'  => url('/'),
            'Thankyou' => 'Give us a feedback'
        ];

        Notification::send($user, new TestNotification($test_notify));
    }
}
