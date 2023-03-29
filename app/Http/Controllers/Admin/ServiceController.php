<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id')->paginate(5);

        return view('admin.service.index' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::select('id' , 'name')->get();
        return view('admin.service.create' , compact('services'));
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
            'image' => 'required',
            'video' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);

        $img_name = null;
        if($request->hasFile('image')) {
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/service'), $img_name);
        }

        $video = array();
        if($files = $request->file('video')) {
            foreach($files as $file) {
                $video_name = md5(rand(1000, 100000));
                $text = strtolower($file->getClientOriginalExtension());
                $video_full_name = $video_name.'.'.$text;
                $upload_path = 'uploads/service/';
                $video_url = $upload_path.$video_full_name;
                $file->move($upload_path, $video_full_name);
                $video[] = $video_url;
            }
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
            $data['video'] = implode('|',$video);;
            $data['description'] = $description;
            $data['user_id'] = Auth::id();
          Service::create($data);
       return redirect()->route('admin.service.index')->with('msg','تم اضافة الخدمة بنجاح')->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services= Service::find($id);
        return view('Admin.service.show',compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $services = Service::select('id' , 'name')->where('id' , '!=' ,$service->id )->get();
        return view('admin.service.edit' , compact('service' , 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
        ]);

        $img_name = $service->image;
        if($request->hasFile('image')) {
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/service'), $img_name);
        }

        $video = array();
        if($files = $request->file('video')) {
            foreach($files as $file) {
                $video_name = md5(rand(1000, 100000));
                $text = strtolower($file->getClientOriginalExtension());
                $video_full_name = $video_name.'.'.$text;
                $upload_path = 'uploads/service/';
                $video_url = $upload_path.$video_full_name;
                $file->move($upload_path, $video_full_name);
                $video[] = $video_url;
            }
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
            $data['video'] = implode('|',$video);;
            $data['description'] = $description;
            $service->update($data);

          return redirect()->route('admin.service.index')->with('msg','تم تعديل الخدمة بنجاح')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->route('admin.service.index')->with('msg' , 'تم حذف الخدمة بنجاح')->with('type','danger');
    }
        /**
     *  Display a trashed listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $services = Service::onlyTrashed()->get();
        return view('admin.service.trash' , compact('services'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Service::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.service.index')->with('msg', 'تم استرجاع الخدمة بنجاح')->with('type', 'warning');
    }

        /**
     * forcedelete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $services = Service::onlyTrashed()->find($id);
        File::delete(public_path('uploads/services/'. $services->image));
        File::delete(public_path('uploads/services/'. $services->video));
        $services->forcedelete();
        return redirect()->route('admin.services.trash')->with('msg', 'تم حذف الخدمة نهائياً')->with('type', 'danger');
    }
}
