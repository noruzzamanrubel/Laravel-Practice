<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boomdev;

class BoomdevsController extends Controller
{
    public function boomdevs()
    {
        return view('boomdevs.boomdevs');
    }

    public function addDeveloper()
    {
        return view('boomdevs.addDeveloper');
    }

    public function storeDeveloper(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:boomdevs|max:25|min:4',
            'email' => 'required|unique:boomdevs|max:25|min:4',
            'phone' => 'required|unique:boomdevs|max:11|min:5',
        ]);

        $developer = new Boomdev;
        $developer->name = $request->name;
        $developer->email = $request->email;
        $developer->phone = $request->phone;
        $developer->save();
        if ($developer) {
            $notification = array(
                'message' => 'Successfully Developer Info Insert',
                'alert-type' => 'success'
            );
            return redirect()->route('all.developer')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing to Update',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allDeveloper()
    {
        $developer = Boomdev::all();
        return view('boomdevs.allDeveloper', compact('developer'));
    }

    public function viewDeveloper($id)
    {
        $developer = Boomdev::findorfail($id);
        return view('boomdevs.viewDeveloper', compact('developer'));
    }

    public function deleteDeveloper($id)
    {
        $developer = Boomdev::findorfail($id);
        $developer->delete();
        $notification = array(
            'message' => 'Successfully Developer Information Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editDeveloper($id)
    {
        $edit = Boomdev::findorfail($id);
        return view('boomdevs.editDeveloper', compact('edit'));
    }

    public function updateDeveloper(Request $request, $id)
    {
        $developer = Boomdev::findorfail($id);
        $developer->name = $request->name;
        $developer->email = $request->email;
        $developer->phone = $request->phone;
        $developer->save();
        $notification = array(
            'message' => 'Successfully Developer Information Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.developer')->with($notification);
    }
}
