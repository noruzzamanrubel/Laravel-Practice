<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function blogpost()
    {
        $category = DB::table('categorys')->get();
        return view('BlogPage', compact('category'));
    }

    public function storepost(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'bail|required|max:255|min:4',
            'details' => 'bail|required|max:500|min:4',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:2000',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'frontend/img/';
            $image_url = $upload_path . $image_full_name;
            $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;
            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'Successfully Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function allpost(){
       $post = DB::table('posts')->get();
       return view('post.AllPost', compact('post'));
    }
}
