<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resturent;
use App\Models\Item;
use App\Models\ItemResturent;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){
        $item = Item::all();

        return view('items.index',compact('item'));
    }

    public function create(){
        $resturent = Resturent::where('user_id', Auth::id())->first();
        if (!$resturent) {
            return redirect()->route('resturent.index');
        }
        return view('items.create');
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->save();

        return redirect()->route('items.index');

    }

    public function item_list($id)
    {   
        $resturent = Resturent::findOrFail($id);
        $old_item_ids = $resturent->itemresturents()->pluck('item_id');
        $items = Item::whereNotIn('id', $old_item_ids)->get();

        return view('items.edit',compact('items', 'resturent'));
      
    }  
    
}
