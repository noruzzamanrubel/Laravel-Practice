<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SiteController extends Controller
{
    // function home($name, $email, $phone)
    // {
    //     return view('HomePage', ['name' => $name, 'email' => $email, 'phone' => $phone]);
    // }

    public function home()
    {
        return view('HomePage');
    }

    public function about()
    {
        return view('AboutPage');
    }

    public function blog()
    {
        return view('BlogPage');
    }

    public function contact()
    {
        return view('ContactPage');
    }

    public function addcategory()
    {
        return view('post.AddCategory');
    }

    public function storecategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|unique:categorys|max:25|min:4',
            'slug' => 'bail|required|unique:categorys|max:25|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categorys')->insert($data);
        if ($category) {
            $notification = array(
                'message' => 'Successfully Category Inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something is Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allcategory()
    {
        $category = DB::table('categorys')->get();
        return view('post.AllCategory', compact('category'));
    }

    public function viewcategory($id)
    {
        $category = DB::table('categorys')->where('id', $id)->first();
        return view('post.ViewCategory', compact('category'));
    }

    public function deletecategory($id)
    {
        $delete = DB::table('categorys')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Successfully Category Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editcategory($id)
    {
        $edit = DB::table('categorys')->where('id', $id)->first();
        return view('post.EditCategory', compact('edit'));
    }

    public function updatecategory(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'bail|required|max:25|min:4',
            'slug' => 'bail|required|max:25|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categorys')->where('id', $id)->update($data);
        if ($category) {
            $notification = array(
                'message' => 'Successfully Category Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing to Update',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
