<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       /*  $posts = \App\Models\Post::all();
        $tags = \App\Models\Tag::all();
        $countries= \App\Models\Country::all();
     
        \App\Models\Post::find(1)->tags()->sync($tags->random(3)->pluck('id')->toArray());
        \App\Models\Post::find(1)->country()->sync($countries->random(3)->pluck('id')->toArray()); */
        //
      //  return $post->country;
      $pts=\App\Models\PostsTags::all();
      \App\Models\Post::find(1)->posts_tags()->sync($pts->random(3)->pluck('id')->toArray());
    $post= \App\Models\Post::find(1);
       return $post->posts_tags;
    }
    /* Upload image
    * @param request
    * @param response
    */
   public function uploadImage(Request $request)
   {
       if($request->hasFile('upload')) {
           //get filename with extension
           $filenamewithextension = $request->file('upload')->getClientOriginalName();

           //get filename without extension
           $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

           //get file extension
           $extension = $request->file('upload')->getClientOriginalExtension();

           //filename to store
           $filenametostore = $filename.'_'.time().'.'.$extension;

           //Upload File
           $request->file('upload')->move('public/uploads', $filenametostore);

           $CKEditorFuncNum = $request->input('CKEditorFuncNum');
           $url = asset('public/uploads/'.$filenametostore);
           $message = 'File uploaded successfully';
           $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

           // Render HTML output
           @header('Content-type: text/html; charset=utf-8');
           echo $result;
       }
   }
}
