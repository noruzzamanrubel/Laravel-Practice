<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function student()
    {
        return view('students.addStudent');
    }

    public function addstudent()
    {
        return view('students.addStudent');
    }

    public function storeStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:students|max:25|min:4',
            'age' => 'required|:students|max:3|min:1',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['age'] = $request->age;
        $student = DB::table('students')->insert($data);
        if ($student) {
            $notification = array(
                'message' => 'Successfully Student Info Inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('all.student')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something is Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allstudent()
    {
        $student = DB::table('students')->get();
        return view('students.allStudent', compact('student'));
    }

    public function viewStudent($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('students.viewStudent', compact('student'));
    }

    public function deleteStudent($id)
    {
        $delete = DB::table('students')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Successfully Student Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editStudent($id)
    {
        $edit = DB::table('students')->where('id', $id)->first();
        return view('students.editStudent', compact('edit'));
    }

    public function updateStudent(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'age' => 'required|max:3|min:1',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['age'] = $request->age;
        $student = DB::table('students')->where('id', $id)->update($data);
        if ($student) {
            $notification = array(
                'message' => 'Successfully student Info Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.student')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing to Update',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
