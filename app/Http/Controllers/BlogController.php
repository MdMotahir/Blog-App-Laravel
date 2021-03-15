<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Gate;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Blog::all();
        return view('Blog.index',['blogs'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::all();
        return view('Blog.add',['category'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:50',
            'content'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp,syg',
            'category'=>'required',

        ]);
        $image_name=time().'-'.$request->title.'.'.$request->image->extension();

        $request->image->move(public_path('images'), $image_name);

        $set_blog=Blog::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$image_name,
            'cat_id'=>$request->category,
            'author_id'=>auth()->user()->id,
        ]);
        return redirect('/blog')->with('success','Your Blog is Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Blog::find($id);
        return view('Blog.details',['blogs'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('update',Blog::find($id))){
            abort(403);
        }else{
            $data=Blog::find($id);
            $cat=Category::all();
            return view('Blog.update',['data'=>$data,'category'=>$cat]);
        }
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:50',
            'content'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp,syg',
            'category'=>'required',

        ]);
        $image_name=time().'-'.$request->title.'.'.$request->image->extension();

        $request->image->move(public_path('images'), $image_name);
        $update_blog=Blog::find($id);
        $update_blog->title=$request->title;
        $update_blog->content=$request->content;
        $update_blog->image=$image_name;
        $update_blog->cat_id=$request->category;
        $update_blog->save();

        return redirect('blog/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Blog::find($id);
        if (! Gate::allows('delete',$data)){
            abort(403);
        }else{
            $data->delete();
            return redirect('/blog')->with('success','your post is deleted');
        }
    }
    public function save_comment(Request $request, $id){
        $request->validate([
            'comment'=>'required',
        ]);
        $comment=Comment::create([
            'comment'=>$request->comment,
            'author_id'=>auth()->user()->id,
            'blog_id'=>$id,
        ]);
        return redirect('blog/'.$id)->with('status','Your comment is added');
    }
}
