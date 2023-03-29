<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id')->paginate(5);
        return view('admin.product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id' , 'name')->get();
        return view('admin.product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'image' => 'required',
            'category_id' => 'nullable|exists:categories,id' ,
        ]);

        $img_name = null;
        if($request->hasFile('image')) {
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/product'), $img_name);
        }

        $title = json_encode([
            'en' => $request->title_en,
            'ar'=> $request->title_ar
        ],JSON_UNESCAPED_UNICODE);

        /*
        بدل ما اعمل اضافة يدوية بقلو هات كل البيانات الراجعة من الريكوست وضيفها
        الحقول الي انا عملتها
        **/

            $data = $request->except('_token');

            unset($data['title_en']);
            unset($data['title_ar']);
            $data['title'] = $title;
            $data['image'] = $img_name;
            Product::create($data);

       return redirect()->route('admin.product.index')->with('msg','تم اضافة المنتج بنجاح')->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products= Product::find($id);
        return view('admin.product.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id' , 'name')->get();
        return view('admin.product.edit' , compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

        $img_name = null;
        if($request->hasFile('image')) {
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/product'), $img_name);
        }

        $title = json_encode([
            'en' => $request->title_en,
            'ar'=> $request->title_ar
        ],JSON_UNESCAPED_UNICODE);

        /*
        بدل ما اعمل اضافة يدوية بقلو هات كل البيانات الراجعة من الريكوست وضيفها
        الحقول الي انا عملتها
        **/

            $data = $request->except('_token');

            unset($data['title_en']);
            unset($data['title_ar']);
            $data['title'] = $title;
            $data['image'] = $img_name;
            $product->update($data);

       return redirect()->route('admin.product.index')->with('msg','تم تعديل  المنتج بنجاح')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.product.index')->with('msg' , 'تم حذف المنتج بنجاح')->with('type','danger');
    }
        /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.trash' , compact('products'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Product::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.product.index')->with('msg', 'تم استرجاع العنصر بنجاح')->with('type', 'warning');
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $products = Product::onlyTrashed()->find($id);
        File::delete(public_path('uploads/product/'. $products->image));
        $products->forcedelete();
        return redirect()->route('admin.products.trash')->with('msg', 'تم حذف المنتج نهائياً')->with('type', 'danger');
    }
}
