<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id')->paginate(5);
        return view('admin.post.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::select('id' , 'name')->get();
        return view('admin.post.create' , compact('posts'));

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
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image' => 'required',
        ]);

        $img_name = null;
        if($request->hasFile('image')) {
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/post'), $img_name);
        }

        $name = json_encode([
            'en' => $request->name_en,
            'ar'=> $request->name_ar
        ],JSON_UNESCAPED_UNICODE);

        $description = json_encode([
            'en' => $request->description_en,
            'ar'=> $request->description_ar
        ],JSON_UNESCAPED_UNICODE);


            /*
            بدل ما اعمل اضافة يدوية بقلو هات كل البيانات الراجعة من الريكوست وضيفها
            الحقول الي انا عملتها
            **/

            $data = $request->except('_token');

            unset($data['name_en']);
            unset($data['name_ar']);
            unset($data['description_en']);
            unset($data['description_ar']);
            $data['name'] = $name;
            $data['image'] = $img_name;
            $data['description'] = $description;
            $data['user_id'] = Auth::id();
            Post::create($data);

       return redirect()->route('admin.post.index')->with('msg','تم اضافة المدونة بنجاح')->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts= Post::find($id);
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $posts = Post::select('id' , 'name')->where('id' , '!=' ,$post->id )->get();
        return view('admin.post.edit' , compact('post' , 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);

        $img_name = $post->image;
        if($request->hasFile('image')) {
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/post'), $img_name);
        }

        $name = json_encode([
            'en' => $request->name_en,
            'ar'=> $request->name_ar
        ],JSON_UNESCAPED_UNICODE);

        $description = json_encode([
            'en' => $request->description_en,
            'ar'=> $request->description_ar
        ],JSON_UNESCAPED_UNICODE);


            /*
            بدل ما اعمل اضافة يدوية بقلو هات كل البيانات الراجعة من الريكوست وضيفها
            الحقول الي انا عملتها
            **/

            $data = $request->except('_token');

            unset($data['name_en']);
            unset($data['name_ar']);
            unset($data['description_en']);
            unset($data['description_ar']);
            $data['name'] = $name;
            $data['image'] = $img_name;
            $data['description'] = $description;

            $post->update($data);

       return redirect()->route('admin.post.index')->with('msg','تم التعديل المدونة بنجاح')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.post.index')->with('msg' , 'تم حذف المنشور بنجاح')->with('type','danger');
    }
        /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trash' , compact('posts'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Post::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.post.index')->with('msg', 'تم استرجاع العنصر بنجاح')->with('type', 'warning');
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $posts = Post::onlyTrashed()->find($id);
        File::delete(public_path('uploads/post/'. $posts->image));
        $posts->forcedelete();
        return redirect()->route('admin.posts.trash')->with('msg', 'م حذف العنصر نهائياً')->with('type', 'danger');
    }
}
