<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Buying;
use App\Models\Category;
use App\Models\Reservation;

class SiteController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id')->take(6)->get();
        $products = Product::orderBy('id')->take(8)->get();
        $categories = Category::orderBy('id')->take(8)->get();
        $product = Product::select('id', 'title')->get();
         return view('site.index', compact('services' , 'products' , 'categories' ,'product'));
    }

    public function about()
    {

       return view('site.about');
    }

    public function search()
    {
        // $products =Product::orderByDesc('id')->where('title', 'like','%'.request()->c .'%')->get();
        $products =Product::orderByDesc('id')->where('title','like','%'.request()->s .'%')->get();
        return view('site.search', compact('products'));
    }
    ///////////////Service الرئيسة//////////////////////
    public function service()
    {
        $services = Service::orderBy('id')->get();
        return view('site.service', compact('services'));
    }

    ///////////////Product لمنتجات//////////////////////
    public function product()
    {
        $products = Product::orderBy('id')->get();
        $categories = Category::orderBy('id')->get();
        $services = Service::orderBy('id')->get();

        return view('site.product', compact('products','categories','services'));
    }

    public function post()
    {
        $posts = Post::orderBy('id')->get();
        $services = Service::orderBy('id')->paginate(10);
         return view('site.post', compact('posts','services'));
    }
    public function contact()
    {
        $posts = Post::orderBy('id')->get();
        $services = Service::orderBy('id')->paginate(10);
        $reservations = Reservation::orderBy('id')->paginate(10);
         return view('site.contact', compact('posts','services','reservations'));
    }

    public function reservation()
    {
        $reservations = Reservation::orderBy('id')->paginate(10);
        $services = Service::orderBy('id')->paginate(10);
         return view('admin.reservation.index' , compact('reservations','services'));
    }
    public function booking()
    {
        $reservations = Reservation::orderBy('id')->paginate(10);
        $services = Service::orderBy('id')->paginate(10);
         return view('site.reservation' , compact('reservations','services'));
    }
    //////تخزين عميل  الحجز//////////
    public function store_reservation(Request $request)
    {
       //dd($request);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'service_id' => 'nullable',
            'city' => 'required',
            'type' => 'required',
        ]);
//lounge الصالة داخلية ولا خارجية
//type هدية شخصي
//area مساحة
        Reservation::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date,
            'service_id' => $request->service_id,
            'area' => $request->area,
            'city' => $request->city,
            'street' => $request->street,
            'lounge' => $request->lounge,
            'type' => $request->type,
            'project_summary' => $request->project_summary

        ]);

         return redirect()->back()->with('msg' , 'تم ارسال الحجز شكرا لمراسلتك')->with('type' , 'success');
    }

    public function buying()
    {
        $buyings = Buying::orderBy('id')->paginate(10);
        $branches = Branch::orderBy('id')->paginate(10);
        $products = Product::orderBy('id')->paginate(10);
        return view('admin.buying.index' , compact('branches' , 'buyings' , 'products'));
    }

        //////تخزين عميل  الشراء//////////
        public function store_buying(Request $request)
        {
           // dd($request);
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'nullable',
                'final_date' => 'required',
                'product_id' => 'nullable',
                'type' => 'required',
                'city' => 'nullable',
                'street' => 'nullable',
                'location' => 'nullable',
                'project_summary' => 'nullable',
                'branch_id' => 'nullable',
            ]);

    //type  توصيل /بدون توصيل
            Buying::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'final_date' => $request->final_date,
                'product_id' => $request->product_id,
                'type' => $request->type,
                'location' => $request->location,
                'city' => $request->city,
                'street' => $request->street,
                'many' => $request->many,
                'project_summary' => $request->project_summary,
                'branch_id' => $request->branch_id,
            ]);

            return redirect()->back()->with('msg' , 'تم ارسال طلب شراء شكرا لمراسلتك')->with('type' , 'success');
        }


}
