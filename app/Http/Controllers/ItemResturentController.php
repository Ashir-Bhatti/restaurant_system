<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resturent;
use App\Models\ItemResturent;
use App\Models\Activity;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ItemResturentController extends Controller
{
	public function store(Request $request)
	{
		$resturentitem = ItemResturent::where('item_id', $request->item_id)->where('resturent_id', $request->resturent_id)->first();
		$resturentitem->quantity = $request->quantity + $resturentitem->quantity;
		$resturentitem->save();
				
		if	($this->activities($resturentitem->id)) {
			return redirect()->route('resturent.edit', $request->resturent_id);
		} else {
			return redirect()->back();
		}
	}
	
	private function activities($resturentitemId)
	{
		$history = new Activity;
		$history->user_id = Auth::id();
		$history->username = Auth::user()->name;
		$history->rest_item_id= $resturentitemId;
		$history->type = 'Addition';
		$history->save();
		
		return true;
	}
	public function add_item(Request $request)
	{
		$add_item = new ItemResturent;
		$add_item->resturent_id = $request->resturent_id;
		$add_item->item_id = $request->item_id;
		$add_item->quantity = 0;
		$add_item->save();

		if	($this->track($add_item)) {
			return redirect()->route('resturent.edit', $request->resturent_id);
		} else {
			return redirect()->back();
		}
	}
	private function track($add_item)
	{
        $history = new Activity;
		$history->user_id = Auth::id();
		$history->username = Auth::user()->name;
		$history->rest_item_id= $add_item->id;;
		$history->type = 'Add_item';
		$history->save();

		return true;
    }
}

