<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class CalenderEntriesController extends Controller
{
    //
    public function index(Request $request){
    	if($request->ajax())
    	{
    		$entry = Entry::whereDate('start_time', '>=', $request->start)
                       ->whereDate('start_time',   '<=', $request->end)
                       ->get(['id', 'title', 'start_time', 'start_time']);
            return response()->json($entry);

    	}
    	return view('calender_entry_mainpage');
    }

    public function action(Request $request)
    {	
    	if($request->ajax())
    	{ 
    		if($request->type == 'add')
    		{
    			$entry = new Entry();
    			$entry->title = $request->title;
    			$entry->start_time = $request->start;
    			$entry->end_time = $request->end;
    			$entry->save();
				return response()->json($entry);
    		}

    		if($request->type == 'update')
    		{
    			$entry = Entry::find($request->id);
    			$entry->title = $request->title;
    			$entry->start_time = $request->start;
    			$entry->end_time = $request->end;
    			$entry->update();
				return response()->json($entry);
    		}

    		if($request->type == 'delete')
    		{
    			$entry = Entry::find($request->id)->delete();
    			return response()->json($entry);
    		}
    	}
    }

    public function AllEntries(){
    	$entry = Entry::get();
        if($entry->isEmpty()){
           return response()->json(['status' => false],200);
       }
        else{
          return response()->json(['status' => true, 'data' => $entry],200);
       }

    }
}
