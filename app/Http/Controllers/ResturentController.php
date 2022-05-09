<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resturent;
use Illuminate\Support\Facades\Hash;
use App\Models\Item;
use App\Models\ItemResturent;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ResturentController extends Controller
{
    public function index()
    {
        if ( Gate::allows('index', Auth::id())) {
            abort(403);
        }
        $resturent = Resturent::where('user_id', Auth::id())->get();

        return view('resturent.index', compact('resturent'));  
    }
    
    public function create_resturent()
    {
        return view('resturent.create');
    }

   
    public function store(Request $request)
    {
        
        $resturent =new Resturent;
        $resturent->user_id=Auth::user()->id;
        $resturent->name =$request->name;
        $resturent->save();
        return redirect()->route('resturent.index');
    }


    public function add_items($id)
    {
        if (Gate::allows('update_post', $id)) {
            abort(403);
        }
        $resturent = Resturent::where('id', $id)->where('user_id', Auth::id())->first();
        // Select*From('')->where->get()
        if (!$resturent) {
            return redirect()->route('resturent.index');
        }
        $resturent = Resturent::findOrFail($id);
        $item_res = ItemResturent::where('resturent_id',$id)
                ->with('item')->get();
        
        return view('resturent.edit', compact('resturent','item_res'));  
    }

   
    public function reduced_qty(Request $request, $id)
    {
        $request->validate([
            "quantity" => 'required|integer'
        ]);

        $resturent_item = Resturent::find($id);
        $resturent_item = ItemResturent::where('item_id', $request->item_id)->first();
        $resturent_item->update(['quantity' => $resturent_item->quantity - $request->quantity]);
        
        if ($this->activity($resturent_item)){
           return redirect()->route('resturent.show', $id);
        } 
  
    }
    public function activity($resturent_item)
    {
        $resturent_item->id;
        $history = new Activity;
        $history->user_id = auth()->id();
        $history->username = Auth::user()->name;
        $history->rest_item_id = $resturent_item->id;
        $history->type = 'substraction';
        $history->save();

        return true;
    }

    Public function myResturent()
    {
            $id = Auth::user()->id;
            $resturent =Resturent::whereHas('users', function($q) use ($id){
                $q->where('user_id', $id);
            })->get();

            return view('resturent.public', compact('resturent'));
    } 

    public function changeQty($id)
    {   
        $resturent = Resturent::find($id);
        $resturant_items = ItemResturent::where('resturent_id',$id)->with('item')->get();

        return view('resturent.show', compact('resturent','resturant_items'));
    }      

}
