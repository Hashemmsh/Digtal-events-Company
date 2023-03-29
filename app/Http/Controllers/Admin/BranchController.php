<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $branches = Branch::orderBy('id')->paginate(10);
        return view('admin.branch.index' , compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::select('id' , 'title')->get();
        return view('admin.branch.create' , compact('branches'));
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
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

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
            $data['user_id'] = Auth::id();
            Branch::create($data);

       return redirect()->route('admin.branch.index')->with('msg','تم اضافة الفرع بنجاح')->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branches= Branch::find($id);
        return view('admin.branch.show',compact('branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $branches = Branch::select('id' , 'title')->where('id' , '!=' ,$branch->id )->get();
        return view('admin.branch.edit' , compact('branch' , 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

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
            $branch->update($data);

       return redirect()->route('admin.branch.index')->with('msg','تم تعديل الفرع بنجاح')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::destroy($id);
        return redirect()->route('admin.branch.index')->with('msg' , 'تم حذف الفرع بنجاح')->with('type','danger');
    }
        /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $branches = Branch::onlyTrashed()->get();
        return view('admin.branch.trash' , compact('branches'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Branch::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.branch.index')->with('msg', 'تم استرجاع الفرع بنجاح')->with('type', 'warning');
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $branches = Branch::onlyTrashed()->find($id);
        $branches->forcedelete();
        return redirect()->route('admin.branches.trash')->with('msg', 'تم حذف الفرع نهائياً')->with('type', 'danger');
    }
}
