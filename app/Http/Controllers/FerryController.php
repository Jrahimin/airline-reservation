<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ferry;
use Uuid;
use App\Enumeration\RoleType;
use Auth;

class FerryController extends Controller
{
    public function all() {
        $airplanes = Ferry::paginate(10);
    	return view('ferry.all', compact('airplanes'));
    }

    public function add() {
    	return view('ferry.add');
    }

    public function addPost(Request $request) {
        $rules  = [
                'name'              => 'required|max:255',
                'captain_name'      => 'required|max:255',
                'number_of_seat'    => 'required|integer',
                'number_of_crew'    => 'required|integer',
                'logo'              => 'required|max:1000|image',
            ];

    	$this->validate($request, $rules);

        // Active Status
    	$active = 0;
    	if ($request->status)
    		$active = 1;

    	// Upload logo
        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $filename = (string)Uuid::generate(4).".".$extension;
    	$destinationPath = 'images/ferry_logo';
    	$image = $file->move($destinationPath, $filename);

    	Ferry::create([
    		'name' => $request->name,
    		'captain_name' => $request->captain_name,
    		'number_of_crew' => $request->number_of_crew,
    		'image_url' => $destinationPath.'/'.$filename,
    		'number_of_seat' => $request->number_of_seat,
            'status' => $active,
        ]);

        return redirect()->route('view_all_ferry');
    }

    public function edit(Ferry $ferry) {
    	return view('ferry.edit', compact('ferry'));
    }

    public function editPost(Request $request, Ferry $ferry) {
        $rules = [
                'name'              => 'required|max:255',
                'captain_name'      => 'required|max:255',
                'number_of_seat'    => 'required|integer',
                'number_of_crew'    => 'required|integer',
                'logo'              => 'max:1000|image',
            ];

    	$this->validate($request, $rules);

        // Active Status
    	$active = 0;
    	if ($request->status)
    		$active = 1;

    	if ($request->logo) {
    		$file = $request->file('logo');
	        $extension = $file->getClientOriginalExtension();
	        $filename = (string)Uuid::generate(4).".".$extension;
	    	$destinationPath = 'images/ferry_logo';
	    	$image = $file->move($destinationPath, $filename);

	    	$ferry->image_url = $destinationPath.'/'.$filename;
    	}

    	$ferry->name = $request->name;
    	$ferry->captain_name = $request->captain_name;
    	$ferry->number_of_crew = $request->number_of_crew;
    	$ferry->number_of_seat = $request->number_of_seat;
    	$ferry->status = $active;
    	$ferry->save();

    	return redirect()->route('view_all_ferry');
    }

    public function delete(Request $request) {
        $id = $request->id;

        $ferry = Ferry::where('id', $id)->first();

        if (!$ferry) {
            return response()->json(['success' => false, 'message' => 'Item not found.']);
        }
        $ferry->delete();

        return response()->json(['success' => true, 'message' => 'Successfully Deleted.']);
    }
}
