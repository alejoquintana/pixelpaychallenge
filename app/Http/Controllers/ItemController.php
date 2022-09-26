<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Inertia\Inertia;


class ItemController extends Controller
{
	public function get()
	{
		return Item::all();
	}

	public function show()
	{
		return Inertia::render('Home', Item::all());
	}

	public function create(Request $request)
	{
		if(!$request->text) return response("Error dato", 500);
		$item = new Item;
		$item->text = $request->text;
		$item->save();
		return $item;

		return Redirect::route('items.show');

	}
}
