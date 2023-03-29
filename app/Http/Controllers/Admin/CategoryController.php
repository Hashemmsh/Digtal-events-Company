<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(10);
        return view('admin.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id' , 'name')->get();
        return view('admin.category.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //dd($request);
            $request->validate([
                'name_en' => 'required',
                'name_ar' => 'required',
            ]);

            $name = json_encode([
                'en' => $request->name_en,
                'ar'=> $request->name_ar
            ],JSON_UNESCAPED_UNICODE);

                /*
                بدل ما اعمل اضافة يدوية بقلو هات كل البيانات الراجعة من الريكوست وضيفها
                الحقول الي انا عملتها
                **/

                $data = $request->except('_token');

                unset($data['name_en']);
                unset($data['name_ar']);
                $data['name'] = $name;
                Category::create($data);

           return redirect()->route('admin.category.index')->with('msg','تم اضافة القسم بنجاح')->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories= Category::find($id);
        return view('admin.category.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::select('id' , 'name')->where('id' , '!=' ,$category->id )->get();
        return view('admin.category.edit' , compact('category' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         //dd($request);
         $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);


            $name = json_encode([
                'en' => $request->name_en,
                'ar'=> $request->name_ar
            ],JSON_UNESCAPED_UNICODE);

            /*
            بدل ما اعمل اضافة يدوية بقلو هات كل البيانات الراجعة من الريكوست وضيفها
            الحقول الي انا عملتها
            **/

            $data = $request->except('_token');

            unset($data['name_en']);
            unset($data['name_ar']);
            $category->update($data);

       return redirect()->route('admin.category.index')->with('msg','تم تعديل القسم بنجاح')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.category.index')->with('msg' , 'تم حذف القسم بنجاح')->with('type','danger');
    }
        /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash' , compact('categories'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.category.index')->with('msg', 'تم ارجاع القسم بنجاح')->with('type', 'warning');
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $categories = Category::onlyTrashed()->find($id);
        $categories->forcedelete();
        return redirect()->route('admin.categories.trash')->with('msg', 'تم حذف القسم نهائياً')->with('type', 'danger');
    }
}
