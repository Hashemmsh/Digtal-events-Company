@extends('site.master')
@section('title', 'Booking -' . config('app.name'))
@section('content')
    @php
        use App\Models\Post;
        use App\Models\Service;
        use App\Models\Branch;
        use App\Models\Buying;
        use App\Models\Product;
    @endphp

@section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $('#datepicker').datepicker();
        });
        $(function() {
            $('#datepicker2').datepicker();
        });
    </script>
@stop
<main>
    <div class="contact">
        <div class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('siteassets/images/Rectangle 32 (1).png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('siteassets/images/Rectangle 32 (2).png') }}" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('siteassets/images/Rectangle 32 (3).png') }}" class="d-block w-100"
                        alt="...">
                </div>
            </div>
        </div>

        <div class="contact-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 col-xl-5">
                        <div class="contact-form-box">
                            <ul class="nav nav-pills nav-fill main-tab mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active mb-3" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        {{ __('site.Booking') }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link buy mx-3 mb-3" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        {{ __('site.Buying') }}
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content main-tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="point-to-point" role="tabpanel"
                                            aria-labelledby="point-to-point-tab" tabindex="0">
                                            {{-- //فرورم الحجز --}}
                                            <form action="{{ route('site.reservation') }}" method="POST">
                                                @csrf
                                                <div class="mb-4">
                                                    <input name="name" class="form-control-tab"
                                                        placeholder="{{ __('site.Name') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <input name="phone" class="form-control-tab"
                                                        placeholder="{{ __('site.Mobile number') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <input name="email" class="form-control-tab"
                                                        placeholder="{{ __('site.E-mail') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <input name="date" type="text" id="datepicker"
                                                        class="form-control-tab-date"
                                                        placeholder="{{ __('site.Date') }}">
                                                </div>

                                                <div class="mb-4">
                                                    <select class="form-select" name="service_id">
                                                        @php
                                                            $services = Service::select('id', 'name')->get();

                                                        @endphp
                                                        <option value="" disabled selected>
                                                            {{ __('site.Select Service') }}</option>
                                                        @foreach ($services as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->trans_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <input type="text" name="area" class="form-control-tab"
                                                        placeholder="{{ __('site.Area') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <select name="city" id="" class="form-select">
                                                        <option value="City">{{ __('site.City') }}</option>
                                                        <option value="تبوك">تبوك</option>
                                                        <option value="نعمي">نعمي</option>
                                                        <option value="الرياض">الرياض</option>
                                                        <option value="حميط">حميط</option>
                                                        <option value="الطائف">الطائف</option>
                                                        <option value="مكة المكرمة">مكة المكرمة</option>
                                                        <option value="رجم الطيارة">رجم الطيارة</option>
                                                        <option value="الثميد">الثميد</option>
                                                        <option value="'عسيلة">عسيلة</option>
                                                        <option value="حائل">حائل</option>
                                                        <option value="بريدة">بريدة</option>
                                                        <option value="الهفوف">الهفوف</option>
                                                        <option value="الدمام">الدمام</option>
                                                        <option value="المدينة المنورة">المدينة المنورة</option>
                                                        <option value="ابها">ابها</option>
                                                        <option value="حالة عمار">حالة عمار</option>
                                                        <option value="جازان">جازان</option>
                                                        <option value="جدة">جدة</option>
                                                        <option value="الشايب">الشايب</option>
                                                        <option value="الفوهة">الفوهة</option>
                                                        <option value="اللوز">اللوز</option>
                                                        <option value="'عين الأخضر">عين الأخضر</option>
                                                        <option value="ذات الحج">ذات الحاج</option>
                                                        <option value="Al Majma'ah">المجمعة</option>
                                                        <option value="Qiyal">قيال</option>
                                                        <option value="Al Akhdar">الاخضر</option>
                                                        <option value="Al Badi'ah">البديعة</option>
                                                        <option value="Mughayrah">مغيرة</option>
                                                        <option value="Al Hawja'">الهوجاء</option>
                                                        <option value="Al Badi'">البديع</option>
                                                        <option value="Al Khobar">الخبر</option>
                                                        <option value="Abar Qana">ابار قنا</option>
                                                        <option value="Al Jab'awiyah">الجبعاوية</option>
                                                        <option value="Al Humaydah">الحميضة</option>
                                                        <option value="Al Bayyanah">البيانة</option>
                                                        <option value="Haql">حقل</option>
                                                        <option value="Ad Durrah">الدرة</option>
                                                        <option value="Az Zaytah">الزيتة</option>
                                                        <option value="'alaqan">علقان</option>
                                                        <option value="Al Wadi Al Jadid">الوادي الجديد</option>
                                                        <option value="Mulayh">مليح</option>
                                                        <option value="Abu Al Hinshan">ابو الحنشان</option>
                                                        <option value="Maqna">مقنا</option>
                                                        <option value="Abu Qa'ar">ابو قعر</option>
                                                        <option value="Markaz Al 'awja">مركز العوجاء</option>
                                                        <option value="Markaz Al 'ulayyimah">مركز العليمة</option>
                                                        <option value="Hafar Al Batin">حفر الباطن</option>
                                                        <option value="Al Qalt">القلت</option>
                                                        <option value="An Nadhim">النظيم</option>
                                                        <option value="Ibn Tuwalah">ابن طوالة</option>
                                                        <option value="As Sidawi">الصداوي</option>
                                                        <option value="Umm Qulaib">ام قليب</option>
                                                        <option value="Urayfij">عريفج</option>
                                                        <option value="Ibn Sharar">ابن شرار</option>
                                                        <option value="Al Qaysumah">القيصومة</option>
                                                        <option value="Ar Ruq'i Al Jadidah">الرقعي الجديدة</option>
                                                        <option value="Dhabhah">ذبحة</option>
                                                        <option value="As Sufairy">الصفيري</option>
                                                        <option value="Al Wayliyah">الوايلية</option>
                                                        <option value="Al Fiwan">الفيوان</option>
                                                        <option value="Al Hamatiyat">الحماطيات</option>
                                                        <option value="Khamis Mushayt">خميس مشيط</option>
                                                        <option value="Al Jabu">الجبو</option>
                                                        <option value="Al Masnah">المسناة</option>
                                                        <option value="Ahad Rifaydah">احد رفيده</option>
                                                        <option value="Umm Ishar Ash Sharqiyyah">ام عشر الشرقية
                                                        </option>
                                                        <option value="Al Qatif">القطيف</option>
                                                        <option value="Buhan">بوهان</option>
                                                        <option value="As Sananiyat">السنانيات</option>
                                                        <option value="Hazaya">حزايا</option>
                                                        <option value="Akbad">أكباد</option>
                                                        <option value="Bir Al Hayz">بئر الحيز</option>
                                                        <option value="Jurayda">جريداء</option>
                                                        <option value="Tayma'">تيماء</option>
                                                        <option value="Al Assafiyah">العسافية</option>
                                                        <option value="'ardah">عردة</option>
                                                        <option value="Al Kutaib">الكتيب</option>
                                                        <option value="Bi'r Fajr">بئر فجر</option>
                                                        <option value="Al Qalibah">القليبة</option>
                                                        <option value="Unayzah">عنيزة</option>
                                                        <option value="Ar Raf'iyah">الرافعية</option>
                                                        <option value="Al Kabarit">الكبريت</option>
                                                        <option value="Raghwah">رغوة</option>
                                                        <option value="Hima">حمى</option>
                                                        <option value="Az Zabr">الزبر</option>
                                                        <option value="As Saffaniyah">السفانية</option>
                                                        <option value="Al Mahawa">المحوى</option>
                                                        <option value="Umm Ghawr">أم غور</option>
                                                        <option value="Qaryat Al 'ulya">قرية العليا</option>
                                                        <option value="Ar Rafi'ah">الرفيعة</option>
                                                        <option value="Jarrarah">جرارة</option>
                                                        <option value="Qurayyah">قرية</option>
                                                        <option value="Al Buwaybiyat">البويبيات</option>
                                                        <option value="As Su'ayyirah">السعيرة</option>
                                                        <option value="Manakh">مناخ</option>
                                                        <option value="Al Hayra">الحيرا</option>
                                                        <option value="Umm Ash Shifallah">ام الشفلح</option>
                                                        <option value="Al Lahabah">اللهابة</option>
                                                        <option value="Al Farridah">الفريدة</option>
                                                        <option value="Ash Shamiyah">الشامية</option>
                                                        <option value="Al 'aytaliyah">العيطلية</option>
                                                        <option value="Sihmah">سحمة</option>
                                                        <option value="Ash Shamlul (Umm Aqla)">الشملول / ام عقلا
                                                        </option>
                                                        <option value="Umm Al Hawshat">ام الهوشات</option>
                                                        <option value="Ash Shayyit">الشيط</option>
                                                        <option value="Al 'adhiriyah">العاذرية</option>
                                                        <option value="Ash Shihiyah">الشيحية</option>
                                                        <option value="Hizwah (Al Umaniyah)">حزوة / العمانية</option>
                                                        <option value="Al Qar'a">القرعاء</option>
                                                        <option value="Al Lisafah">اللصافة</option>
                                                        <option value="An Nuqayrah">النقيرة</option>
                                                        <option value="Hijrat Awlad Hithlin">هجرة أولاد حثلين</option>
                                                        <option value="Al Jubail">الجبيل</option>
                                                        <option value="Farzan">فرزان</option>
                                                        <option value="An Nu'ayriyah">النعيرية</option>
                                                        <option value="Umm Dulay'">ام ضليع</option>
                                                        <option value="Mulayjah">مليجة</option>
                                                        <option value="As Sarrar">الصرار</option>
                                                        <option value="Hanidh">حنيذ</option>
                                                        <option value="Mughati">مغطي</option>
                                                        <option value="Shifiyah">شفية</option>
                                                        <option value="Utayyiq">عتيق</option>
                                                        <option value="Al Husayy">الحسي</option>
                                                        <option value="Thaj">ثاج</option>
                                                        <option value="Al Hinnah">الحناة</option>
                                                        <option value="Al Kahafah">الكهفة</option>
                                                        <option value="As Sahaf">الصحاف</option>
                                                        <option value="Al Uyainah">العيينة</option>
                                                        <option value="Al Qulayyib">القليب</option>
                                                        <option value="Al Wannan">الونان</option>
                                                        <option value="Ghanwa">غنوى</option>
                                                        <option value="Az Zughayn">الزغين</option>
                                                        <option value="Nita'">نطاع</option>
                                                        <option value="Umm Al Hamam">ام الحمام</option>
                                                        <option value="Umm Rubay'ah">ام ربيعة</option>
                                                        <option value="Abu Hadriyah">ابو حدرية</option>
                                                        <option value="Munifah">منيفة</option>
                                                        <option value="Al Aflaj">الافلاج</option>
                                                        <option value="Khaitan">خيطان</option>
                                                        <option value="Al Wasi'ah">الوسيعة</option>
                                                        <option value="Tamriyah">تمرية</option>
                                                        <option value="Abu Khusayfa">ابو خسيفاء</option>
                                                        <option value="An Nakhil">النخيل</option>
                                                        <option value="As Suhaymi">السحيمي</option>
                                                        <option value="Masadah">مصدة</option>
                                                        <option value="Umm Sudayrah">أم سديرة</option>
                                                        <option value="At Tanhah">التنهاة</option>
                                                        <option value="Qura At Tuwaym">قري التويم</option>
                                                        <option value="Ash Shahmah">الشحمة</option>
                                                        <option value="Al Wuday">الودي</option>
                                                        <option value="Juwayy">جوي</option>
                                                        <option value="Muqbilah">مقبلة</option>
                                                        <option value="Harmah">حرمة</option>
                                                        <option value="Al Ma'dham">المعظم</option>
                                                        <option value="Jirab">جراب</option>
                                                        <option value="Al 'uqlah">العقلة</option>
                                                        <option value="An Nughayq">النغيق</option>
                                                        <option value="Huwaimidah">حويمضة</option>
                                                        <option value="Al Butaira'">البتيراء</option>
                                                        <option value="Al Mishash">المشاش</option>
                                                        <option value="Al Furuthi">الفروثي</option>
                                                        <option value="Jalajil">جلاجل</option>
                                                        <option value="Ad Dakhilah">الدخيلة</option>
                                                        <option value="Al Husun">الحصون</option>
                                                        <option value="Hawtat Sudair">حوطة سدير</option>
                                                        <option value="Rawdat Sudair">روضة سدير</option>
                                                        <option value="Tumair">تمير</option>
                                                        <option value="Al Artawiyah">الارطاوية</option>
                                                        <option value="Al 'amar">العمار</option>
                                                        <option value="Al Khis">الخيس</option>
                                                        <option value="Al Ma'ashbah">المعشبة</option>
                                                        <option value="At Tuwaym">التويم</option>
                                                        <option value="Al Khutamah">الخطامة</option>
                                                        <option value="Ar Ruwaydah">الرويضة</option>
                                                        <option value="Ash Shi'b">الشعب</option>
                                                        <option value="Asharat Sudair">عشيرة سدير</option>
                                                        <option value="Al Junayfi">الجنيفي</option>
                                                        <option value="Al 'attar">العطار</option>
                                                        <option value="Umm Al Jamajim">ام الجماجم</option>
                                                        <option value="Mishlah">مشلح</option>
                                                        <option value="Umm Rujum">ام رجوم</option>
                                                        <option value="Ar Ruwaydah">الرويضة</option>
                                                        <option value="Al Faysaliyah">الفيصلية</option>
                                                        <option value="Bawda'">بوضاء</option>
                                                        <option value="Al Hair">الحائر</option>
                                                        <option value="Wushayy">وشي</option>
                                                        <option value="'awdat Sudayr">عودة سدير</option>
                                                        <option value="Mubayid">مبايض</option>
                                                        <option value="Al Qa'iyah">القاعية</option>
                                                        <option value="Dibdibbat Fudala">دبدبة فضلاء</option>
                                                        <option value="Al Hajab">الحجب</option>
                                                        <option value="Adh Dhalfah">الضلفة</option>
                                                        <option value="Abu Taqah">أبو طاقة</option>
                                                        <option value="Al 'ayn Al Jadidah">العين الجديدة</option>
                                                        <option value="Al Qa'arah">القعرة</option>
                                                        <option value="Umm Zarb">أم زرب</option>
                                                        <option value="Hadiyah">هدية</option>
                                                        <option value="Al Qa'arah">القعرة</option>
                                                        <option value="Al Ula">العلا</option>
                                                        <option value="Al Jahara">الجهراء</option>
                                                        <option value="Ruhayb">رحيب</option>
                                                        <option value="Shalal">شلال</option>
                                                        <option value="Da'a">ضاعا</option>
                                                        <option value="Jaydah">جيدة</option>
                                                        <option value="Qulban 'isharah">قلبان عشرة</option>
                                                        <option value="An Najil">النجيل</option>
                                                        <option value="Ar Ruzayqiyah">الرزيقية</option>
                                                        <option value="Al Hamidiyah">الحميدية</option>
                                                        <option value="Sadr">صدر</option>
                                                        <option value="Mughayra'">مغيراء</option>
                                                        <option value="Qusayb Abu Siyal">قصيب ابو سيال</option>
                                                        <option value="Abu Arakah">ابو اراكة</option>
                                                        <option value="Madain As Salih">مدائن الصالح</option>
                                                        <option value="Awarsh">عورش</option>
                                                        <option value="An Nushayfah">النشيفة</option>
                                                        <option value="Az Zubayir">الزباير</option>
                                                        <option value="Ad Dulay'ah">الضليعة</option>
                                                        <option value="Mitan Al 'urayqah">متان العريقة</option>
                                                        <option value="Al Abraq">الابرق</option>
                                                        <option value="Amirah">اميرة</option>
                                                        <option value="Al Jadidah">الجديدة</option>
                                                        <option value="Kutayfat Masadir">كتيفة مصادر</option>
                                                        <option value="Ar Ras">الراس</option>
                                                        <option value="Al Bayt">البيت</option>
                                                        <option value="Bir Bahar">بئر بحار</option>
                                                        <option value="Sabhan">سبحان</option>
                                                        <option value="Dhahran">الظهران</option>
                                                        <option value="Umm Ar Rih">أم الريح</option>
                                                        <option value="Haram">حرم</option>
                                                        <option value="'akuz">عكوز</option>
                                                        <option value="As Sudayd">السديد</option>
                                                        <option value="Al Hufayrah">الحفيرة</option>
                                                        <option value="Al Wajh">الوجه</option>
                                                        <option value="An Nabi'">النابع</option>
                                                        <option value="'antar">عنتر</option>
                                                        <option value="Al Manjur">المنجور</option>
                                                        <option value="Aba Al Qizaz">ابا القزاز</option>
                                                        <option value="Bada'">بداء</option>
                                                        <option value="Khurba'">خرباء</option>
                                                        <option value="Al Kurr">الكر</option>
                                                        <option value="Burq Al Usaydiyah">برق الأسيدية</option>
                                                        <option value="Al Fadili">الفاضلي</option>
                                                        <option value="Buqayq">بقيق</option>
                                                        <option value="Qurayyah">قرية</option>
                                                        <option value="Dhulum">ظلوم</option>
                                                        <option value="New 'ayn  Dar">عين دار الجديده</option>
                                                        <option value="Old 'ayn  Dar">عين دار القديمة</option>
                                                        <option value="Allat">علاة</option>
                                                        <option value="Fudah">فودة</option>
                                                        <option value="Al Kadadiyah">الكدادية</option>
                                                        <option value="Yakrub">يكرب</option>
                                                        <option value="Al Jabiriyah">الجابرية</option>
                                                        <option value="Salasil">صلاصل</option>
                                                        <option value="Shuhayla'">شهيلاء</option>
                                                        <option value="Usayfirat">عصيفرات</option>
                                                        <option value="Tarib">طريب</option>
                                                        <option value="Ad Dughaymiyah">الدغيمية</option>
                                                        <option value="Ar Rawdah">الروضة</option>
                                                        <option value="Al Mansaf">المنسف</option>
                                                        <option value="Mansiyah Al Gharbiyah">منسية الغربية</option>
                                                        <option value="'ushayrah">عشيرة</option>
                                                        <option value="Al Faysaliyah">الفيصلية</option>
                                                        <option value="Ath Thuwayr">الثوير</option>
                                                        <option value="Zulayghif">زليغف</option>
                                                        <option value="Mazari' Al Athlah">مزارع الاثلة</option>
                                                        <option value="Mazari' Ar Ruhayyah">مزارع الرحية</option>
                                                        <option value="Qusayba">قصيباء</option>
                                                        <option value="Mazra'at Bayda Nuthayl">مزرعة بيضاء نثيل
                                                        </option>
                                                        <option value="Imarat Al Mistawi">امارة المستوي</option>
                                                        <option value="Az Zulfi">الزلفي</option>
                                                        <option value="Samnan">سمنان</option>
                                                        <option value="'iliqah">علقة</option>
                                                        <option value="Al 'ayn">العين</option>
                                                        <option value="Al Mudhawih">المضاويح</option>
                                                        <option value="Aba Al Baqar">ابا البقر</option>
                                                        <option value="Al Hardhah">الحرضة</option>
                                                        <option value="Adh Dhars">الضرس</option>
                                                        <option value="Al Khuraybah">الخريبة</option>
                                                        <option value="Al 'araid">العرائد</option>
                                                        <option value="Ghamrah">غمرة</option>
                                                        <option value="Al 'uqaylah">العقيلة</option>
                                                        <option value="Al 'adlah">العدلة</option>
                                                        <option value="Ad Disah">الديسة</option>
                                                        <option value="As Sulaymi">السليمي</option>
                                                        <option value="Al Jarf">الجرف</option>
                                                        <option value="Al Hadhluli">الهذلولي</option>
                                                        <option value="Jad'a">جدعاء</option>
                                                        <option value="Khaybar">خيبر</option>
                                                        <option value="Al Lihin">اللحن</option>
                                                        <option value="Al 'ishash">العشاش</option>
                                                        <option value="As Silsilah">الصلصلة</option>
                                                        <option value="Al Thamad">الثمد</option>
                                                        <option value="Al Uyaynah">العينية</option>
                                                        <option value="Rumah">رماح</option>
                                                        <option value="Hafar Al Atk">حفر العتك</option>
                                                        <option value="Al Muzayri'">المزيرع</option>
                                                        <option value="Shawyah">شوية</option>
                                                        <option value="Al Hifnah">الحفنة</option>
                                                        <option value="Al Ghaylanah">الغيلانة</option>
                                                        <option value="Ar Rumhiyah">الرمحية</option>
                                                        <option value="Ar Rakah">الراكة</option>
                                                        <option value="Al Khuraytah">الخريطة</option>
                                                        <option value="Ath Thuqbah">الثقبة</option>
                                                        <option value="Al 'aziziyah">العزيزية</option>
                                                        <option value="Shadwa">شدوا</option>
                                                        <option value="Al Ghat">الغاط</option>
                                                        <option value="Mulayh">مليح</option>
                                                        <option value="Ash Shaban">الشبعان</option>
                                                        <option value="Ad Duqum">الدقم</option>
                                                        <option value="Al Qars">القرص</option>
                                                        <option value="Hirad">حراض</option>
                                                        <option value="Ash Shibahah">الشبحة</option>
                                                        <option value="Rawdat Al Aghaydirat">روضة الاغيدرات</option>
                                                        <option value="Al Khadra Al Jadidah">الخضراء الجديدة</option>
                                                        <option value="Samur">سمور</option>
                                                        <option value="Al Ruwaydat">الرويضات</option>
                                                        <option value="Al Mahadrah">المهدرة</option>
                                                        <option value="Buqaylah">بقيلة</option>
                                                        <option value="An Nu'aylah">النعيلة</option>
                                                        <option value="Az Zaghliyah">الزغلية</option>
                                                        <option value="Tuwalah">توله</option>
                                                        <option value="Al 'ayn">العين</option>
                                                        <option value="Umluj">املج</option>
                                                        <option value="Famm Shithath">فم شثاث</option>
                                                        <option value="Al Harrah">الحرة</option>
                                                        <option value="Al 'ambijah">العمبجة</option>
                                                        <option value="Ash Shidakh">الشدخ</option>
                                                        <option value="Al Maramiyah">المرامية</option>
                                                        <option value="Mazari' Al Badai'">مزارع البدائع</option>
                                                        <option value="Al Khatilah">الخاتلة</option>
                                                        <option value="Al Bilad Al Wusta">البلاد الوسطى</option>
                                                        <option value="Al 'ulayya">العليا</option>
                                                        <option value="Al Hisyan">الحسيان</option>
                                                        <option value="Ad Dul 'ayi">الضلعي</option>
                                                        <option value="Tunaibikah">تنيبيكة</option>
                                                        <option value="'ablah">عبلة</option>
                                                        <option value="'abliyah">عبلية</option>
                                                        <option value="Hijrat As Silat">هجرة السلات</option>
                                                        <option value="Umm Talhah">ام طلحة</option>
                                                        <option value="Mua'rij Qulaishah">معرج قليشة</option>
                                                        <option value="Daghan">داغان</option>
                                                        <option value="Al Jurfiyah">الجرفية</option>
                                                        <option value="Hashashah">حشاشة</option>
                                                        <option value="Al Mardamah">المردمة</option>
                                                        <option value="Lahdat As Sayahid">لهدة الصياهد</option>
                                                        <option value="Al Barza">البرزاء</option>
                                                        <option value="Al Faydah">الفيضة</option>
                                                        <option value="Al Khalidiyah">الخالدية</option>
                                                        <option value="Al Hamadah">الحمادة</option>
                                                        <option value="Al Qararah">القرارة</option>
                                                        <option value="Al Hamnah">الحمنة</option>
                                                        <option value="Umm Al Ghiran">أم الغيران</option>
                                                        <option value="Al Mundassah">المندسة</option>
                                                        <option value="As Sulaymiyah">السليمية</option>
                                                        <option value="Al Barraqiyah">البراقية</option>
                                                        <option value="As Siraqi">السراقي</option>
                                                        <option value="Abar Dahmulah">آبار دحمولة</option>
                                                        <option value="Al Quway'iyah">القويعية</option>
                                                        <option value="Badai' Al Harasin">بدائع الهراسين</option>
                                                        <option value="Mahd Adh Dhahab">مهد الذهب</option>
                                                        <option value="Sufaynah">صفينة</option>
                                                        <option value="Ar Riqabiyah">الرقابية</option>
                                                        <option value="As Sulhaniyah">الصلحانية</option>
                                                        <option value="Al Ghashiyah">الغاشية</option>
                                                        <option value="Al Asayhir">الاصيحر</option>
                                                        <option value="As Suwayriqiyah">السويرقية</option>
                                                        <option value="Tharb">ثرب</option>
                                                        <option value="Hadhah">حاذة</option>
                                                        <option value="Al Umaq">العمق</option>
                                                        <option value="As Sa'biyah">الصعبية</option>
                                                        <option value="Al Qa'arah">القعرة</option>
                                                        <option value="Al Juhfah">الجحفة</option>
                                                        <option value="Rayin">راين</option>
                                                        <option value="Az Zuwayra">الزويراء</option>
                                                        <option value="Al Nuwaybi'">النويبع</option>
                                                        <option value="Al 'uqlah">العقلة</option>
                                                        <option value="Rabigh">رابغ</option>
                                                        <option value="Masturah">مستورة</option>
                                                        <option value="Al Abwa'">الابواء</option>
                                                        <option value="Shuluwah">شلوة</option>
                                                        <option value="Kilayyah">كلية</option>
                                                        <option value="Hajur">حجر</option>
                                                        <option value="Sa'bar">صعبر</option>
                                                        <option value="At Tandabiyah">التنضبية</option>
                                                        <option value="Quwayzah">قويزة</option>
                                                        <option value="An Nazzah">النزة</option>
                                                        <option value="Ash Shu'abah">الشعبة</option>
                                                        <option value="As Sadr">الصدر</option>
                                                        <option value="Al Magharibah">المغاربة</option>
                                                        <option value="Al Kuwaysiyah">الكويسية</option>
                                                        <option value="Abu Hulayfa">ابو حليفاء</option>
                                                        <option value="Mahjubah">محجوبة</option>
                                                        <option value="Bir Al Faydah">بئر الفيضة</option>
                                                        <option value="Al Humayj">الهميج</option>
                                                        <option value="Adh Dhibiyah">الذيبية</option>
                                                        <option value="Khadra">خضراء</option>
                                                        <option value="Al Badayi'">البدايع</option>
                                                        <option value="Battahah">بطاحة</option>
                                                        <option value="As Saqrah">الصقرة</option>
                                                        <option value="Wabrah">وبرة</option>
                                                        <option value="Abu 'isharah">أبو عشرة</option>
                                                        <option value="Al Mu'allaq">المعلق</option>
                                                        <option value="Ar Rumaythi">الرميثي</option>
                                                        <option value="Al Hiraniyah">الهرانية</option>
                                                        <option value="Ar Radum">الرضم</option>
                                                        <option value="Ath Tha'al">الثعل</option>
                                                        <option value="Al Unsiyat">الانسيات</option>
                                                        <option value="Far'at Ar Rumaythi">فرعة الرميثي</option>
                                                        <option value="Al Butayn">البطين</option>
                                                        <option value="Mushrifah">مشرفة</option>
                                                        <option value="Bidaydah">بديدة</option>
                                                        <option value="Al Mijhiliyah">المجهلية</option>
                                                        <option value="Al Baharah">البحرة</option>
                                                        <option value="Buday'ah">بديعة</option>
                                                        <option value="Al Juthum">الجثوم</option>
                                                        <option value="Ash Shuwaytin">الشويطن</option>
                                                        <option value="Al Mahamah">المحامة</option>
                                                        <option value="Afif">عفيف</option>
                                                        <option value="Abraqiyah">ابرقية</option>
                                                        <option value="Al Jammaniyah">الجمانية</option>
                                                        <option value="Al Ashariyah">الاشعرية</option>
                                                        <option value="Al Khadarah">الخضارة</option>
                                                        <option value="As Salhiyah">الصالحية</option>
                                                        <option value="Badai' Al Idyan">بدائع العضيان</option>
                                                        <option value="Umm Arta">أم أرطى</option>
                                                        <option value="Al Maklah">المكلاة</option>
                                                        <option value="'ushayran">عشيران</option>
                                                        <option value="Bu'aythiran">بعيثران</option>
                                                        <option value="Umm Qusur">أم قصور</option>
                                                        <option value="'abdah">عبدة</option>
                                                        <option value="Khuraysah">خريصة</option>
                                                        <option value="'ajabah">عجابة</option>
                                                        <option value="Al Mudayfi'">المديفع</option>
                                                        <option value="Al Qidrawiyah">القدراوية</option>
                                                        <option value="Ubayrah">أوبيرة</option>
                                                        <option value="Umm Athlah">أم أثلة</option>
                                                        <option value="Al Akhdar">الأخضر</option>
                                                        <option value="Muti'ah">مطيعة</option>
                                                        <option value="Al Madarah">المدارة</option>
                                                        <option value="'usaylah">عسيلة</option>
                                                        <option value="Al Hilwah">الحلوة</option>
                                                        <option value="Ad Dubayjah">الدبيجة</option>
                                                        <option value="Thadiq">ثادق</option>
                                                        <option value="Ar Rawbidah / Raghabah">الروبضة / رغبة</option>
                                                        <option value="Ruwaydat As Suhul">رويضة السهول</option>
                                                        <option value="Mishash As Suhul">مشاش السهول</option>
                                                        <option value="Al Husayy">الحسي</option>
                                                        <option value="As Sufarat">الصفرات</option>
                                                        <option value="Al Bir">البير</option>
                                                        <option value="Ruwayghib">رويغب</option>
                                                        <option value="An Najf">النجف</option>
                                                        <option value="As Sutayh">السطيح</option>
                                                        <option value="Al Khaymah">الخيمة</option>
                                                        <option value="Sayhat">سيهات</option>
                                                        <option value="Tafidah">تفيدة</option>
                                                        <option value="Tarut">تاروت</option>
                                                        <option value="Nadya">ندياء</option>
                                                        <option value="Mushrifah">مشرفة</option>
                                                        <option value="Duwayyinah">دوينه</option>
                                                        <option value="'adan">عدن</option>
                                                        <option value="Al Ahmar">الأحمر</option>
                                                        <option value="Al Muthallath">المثلث</option>
                                                        <option value="Al Far'">الفرع</option>
                                                        <option value="Al Biqa'">البقاع</option>
                                                        <option value="An Najil">النجيل</option>
                                                        <option value="Al Bathnah">البثنة</option>
                                                        <option value="Khayf Husayn">خيف حسين</option>
                                                        <option value="Al Baqqariyah">البقارية</option>
                                                        <option value="Al Fuq'ali">الفقعلي</option>
                                                        <option value="Al Mushayrif">المشريف</option>
                                                        <option value="Umm Al Misin">أم المسن</option>
                                                        <option value="Al Badi'">البديع</option>
                                                        <option value="Ad Darah">الدارة</option>
                                                        <option value="Al Quray">القري</option>
                                                        <option value="As Sulaym">السليم</option>
                                                        <option value="Al Luthamah">اللثامة</option>
                                                        <option value="Al Muqanna'">المقنع</option>
                                                        <option value="Dufyan">ضفيان</option>
                                                        <option value="'adad">عضاد</option>
                                                        <option value="Al 'idwah">العدوة</option>
                                                        <option value="An Nabah">النباة</option>
                                                        <option value="Al Baridi">البريدي</option>
                                                        <option value="Yanbu">ينبع</option>
                                                        <option value="Al Qarrasah">القراصة</option>
                                                        <option value="Al 'is">العيص</option>
                                                        <option value="Al Jabiriyah">الجابرية</option>
                                                        <option value="Yanbu An Nakhil">ينبع النخل</option>
                                                        <option value="Jarajir">جراجر</option>
                                                        <option value="Tir'ah">ترعة</option>
                                                        <option value="Al Murabba'">المربع</option>
                                                        <option value="Nabt">نبط</option>
                                                        <option value="As Salilah">السليلة</option>
                                                        <option value="Al Qarain">القرائن</option>
                                                        <option value="Ash Shukayyrah">الشكيرة</option>
                                                        <option value="Hijrat Al Mughur">هجرة المغر</option>
                                                        <option value="Mazari' Al Muhtajibah">مزارع المحتجبة</option>
                                                        <option value="Al Ghurabah">الغرابة</option>
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <input type="text" name="street" class="form-control-tab"
                                                        placeholder="{{ __('site.Street') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <select name="lounge" id="" class="form-select">
                                                        <option value="نوع"> {{ __('site.Lounge type') }}</option>
                                                        <option value="داخلي"> {{ __('site.Indoor hall') }}</option>
                                                        <option value="خارجي">{{ __('site.outdoor lounge') }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <select name="type" id="" class="form-select">
                                                        <option value="هدية"> {{ __('site.gift') }}</option>
                                                        <option value="شخصي">{{ __('site.Personal') }}</option>
                                                    </select>
                                                </div>




                                                <div class="mb-4">
                                                    <textarea name="project_summary" class="form-control-tab" rows="6"
                                                        placeholder="{{ __('site.project_summary') }} "></textarea>
                                                </div>
                                                <div>
                                                    <button
                                                        class="btn btn-form-tab rounded-pill">{{ __('site.send') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">
                                    {{-- //فورم الشراء --}}
                                    <form action="{{ route('site.buying') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <input name="name" class="form-control-tab"
                                                placeholder="{{ __('site.Name') }}">
                                        </div>
                                        <div class="mb-4">
                                            <input name="phone" class="form-control-tab"
                                                placeholder="{{ __('site.Mobile number') }}">
                                        </div>
                                        <div class="mb-4">
                                            <input name="email" class="form-control-tab"
                                                placeholder="{{ __('site.E-mail') }}">
                                        </div>
                                        <div class="mb-4">
                                            <input name="final_date" type="text" id="datepicker2"
                                                class="form-control-tab-date"
                                                placeholder="{{ __('site.Deadline') }}">
                                        </div>
                                        <div class="mb-4">
                                            <select class="form-select" name="product_id">
                                                @php
                                                    $products = Product::select('id', 'title')->get();
                                                @endphp
                                                <option value="" disabled selected>
                                                    {{ __('site.Select Product') }}</option>
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}">{{ $item->trans_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <input name="many" class="form-control-tab"
                                                placeholder="{{ __('site.Many') }}">
                                        </div>
                                        <div class="mb-4">
                                            <select name="type" id="delivery-type" class="form-select">
                                                <option value="شراء بتوصيل">شراء بتوصيل </option>
                                                <option value="شراء بدون توصيل">شراء بدون توصيل</option>
                                            </select>
                                        </div>
                                        <div class="delivery">
                                            <div class="mb-4">
                                                <input name="location" type="text" class="form-control-tab"
                                                    placeholder="{{ __('site.location') }}">
                                            </div>
                                            <div class="mb-4">
                                                <input name="city" type="text" class="form-control-tab"
                                                    placeholder="{{ __('site.City') }}">
                                            </div>
                                            <div class="mb-4">
                                                <input name="street" type="text" class="form-control-tab"
                                                    placeholder="{{ __('site.Street') }}">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <textarea name="project_summary" class="form-control-tab" rows="6"
                                                placeholder="{{ __('site.project_summary') }} "></textarea>
                                        </div>
                                        <div class="text-start mb-4 no-delivery d-none">
                                            <b>{{ __('site.Receipt from the branch') }}</b> <br>
                                            @php
                                                $branchies = Branch::select('id', 'title')->get();

                                            @endphp
                                            @foreach ($branchies as $branch)
                                                <label>
                                                    <input type="radio" name="branch_id">
                                                </label> {{ $branch->trans_title }}<br>
                                            @endforeach
                                        </div>

                                        <div>
                                            <button class="btn btn-form rounded-pill">{{ __('site.send') }} </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="partnars mt-5 mb-5" data-aos="fade-up">
        <p class="mt-5">{{ __('site.Success Partners') }}</p>
        <div class="boxs-wrapper mt-0">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row justify-content-center text-center">
                        <div class="slider1 owl-carousel mt-5">
                            <div class="col">
                                <div class="brand-box">
                                    <div class="icon">
                                        <img src="{{ asset('siteassets/images/Success/success (1).png') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="brand-box">
                                    <div class="icon">
                                        <img src="{{ asset('siteassets/images/Success/success (2).png') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="brand-box">
                                    <div class="icon">
                                        <img src="{{ asset('siteassets/images/Success/success (3).png') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="brand-box">
                                    <div class="icon">
                                        <img src="{{ asset('siteassets/images/Success/success (4).png') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="brand-box">
                                    <div class="icon">
                                        <img src="{{ asset('siteassets/images/Success/success (5).png') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="brand-box">
                                    <div class="icon">
                                        <img src="{{ asset('siteassets/images/Success/success (6).png') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="brand-box">
                                    <div class="icon">
                                        <img src="{{ asset('siteassets/images/Success/success (7).png') }}" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us" data-aos="fade-down">
        <h3> {{ __('site.Connect with us') }}</h3>
        <div class="container">
            <div class="contact-box">
                <div class="row">
                    <div class="col-md-5">
                        <h4 class="mb-5">{{ __('site.Book with us now') }}</h4>
                        <form action="{{ route('site.reservation') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input name="name" type="text" class="form-control"
                                    placeholder="{{ __('site.Name') }}">
                            </div>
                            <div class="mb-4">
                                <input name="phone" type="text" class="form-control"
                                    placeholder="{{ __('site.Mobile number') }}">
                            </div>
                            <div class="mb-4">
                                <input name="email" type="text" class="form-control"
                                    placeholder="{{ __('site.E-mail') }}">
                            </div>
                            <div class="mb-4">
                                <select class="form-select" name="service_id">
                                    @php
                                        $services = Service::select('id', 'name')->get();

                                    @endphp
                                    <option value="" disabled selected>{{ __('site.Select Service') }}</option>
                                    @foreach ($services as $item)
                                        <option value="{{ $item->id }}">{{ $item->trans_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <div class="mb-4">
                                    <select name="type" class="form-select">
                                        <option value="هدية"> {{ __('site.gift') }}</option>
                                        <option value="شخصي">{{ __('site.Personal') }}</option>
                                    </select>
                                </div>
                                {{-- <input name="type" type="text" class="form-control" placeholder="{{ __('site.Reservation type') }}"> --}}
                            </div>
                            <div class="mb-4">
                                <input name="city" type="text" class="form-control"
                                    placeholder="{{ __('site.City') }}">
                            </div>
                            <div class="mb-4">
                                <textarea name="project_summary" class="form-control" rows="6"
                                    placeholder="{{ __('site.project_summary') }}"></textarea>
                            </div>
                            <div class="mb-4">
                                <button class="btn btn-form rounded-pill">{{ __('site.send') }} </button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-5 mx-sm-5">
                        <h4 class="mb-5"> {{ __('site.Keep in touch with us') }}</h4>
                        <div class="d-flex align-items-left mb-5">
                            <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.0001 16.6613L32.3776 7.425C31.7995 6.99144 31.0976 6.75484 30.3751 6.75H5.62506C4.90251 6.75484 4.20059 6.99144 3.62256 7.425L18.0001 16.6613Z"
                                    fill="#898787" />
                                <path
                                    d="M18.6075 18.945L18.4163 19.035H18.3263C18.2227 19.0813 18.1127 19.1116 18 19.125C17.9066 19.1367 17.8121 19.1367 17.7188 19.125H17.6288L17.4375 19.035L2.3625 9.29248C2.29048 9.56421 2.25268 9.84388 2.25 10.125V25.875C2.25 26.7701 2.60558 27.6285 3.23851 28.2615C3.87145 28.8944 4.72989 29.25 5.625 29.25H30.375C31.2701 29.25 32.1286 28.8944 32.7615 28.2615C33.3944 27.6285 33.75 26.7701 33.75 25.875V10.125C33.7473 9.84388 33.7095 9.56421 33.6375 9.29248L18.6075 18.945Z"
                                    fill="#898787" />
                            </svg>

                            <div class="contact-details mx-3">
                                <span style="color:#40BDEB"> {{ __('site.E-mail') }}</span>
                                <p class="mt-1"><a
                                        href="mailto: info@digitaleventspro.com">info@digitaleventspro.com</a> </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-left mb-5">
                            <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_106_59)">
                                    <path
                                        d="M17.985 3C9.705 3 3 9.72 3 18C3 26.28 9.705 33 17.985 33C26.28 33 33 26.28 33 18C33 9.72 26.28 3 17.985 3ZM28.38 12H23.955C23.475 10.125 22.785 8.325 21.885 6.66C24.645 7.605 26.94 9.525 28.38 12ZM18 6.06C19.245 7.86 20.22 9.855 20.865 12H15.135C15.78 9.855 16.755 7.86 18 6.06ZM6.39 21C6.15 20.04 6 19.035 6 18C6 16.965 6.15 15.96 6.39 15H11.46C11.34 15.99 11.25 16.98 11.25 18C11.25 19.02 11.34 20.01 11.46 21H6.39ZM7.62 24H12.045C12.525 25.875 13.215 27.675 14.115 29.34C11.355 28.395 9.06 26.49 7.62 24ZM12.045 12H7.62C9.06 9.51 11.355 7.605 14.115 6.66C13.215 8.325 12.525 10.125 12.045 12ZM18 29.94C16.755 28.14 15.78 26.145 15.135 24H20.865C20.22 26.145 19.245 28.14 18 29.94ZM21.51 21H14.49C14.355 20.01 14.25 19.02 14.25 18C14.25 16.98 14.355 15.975 14.49 15H21.51C21.645 15.975 21.75 16.98 21.75 18C21.75 19.02 21.645 20.01 21.51 21ZM21.885 29.34C22.785 27.675 23.475 25.875 23.955 24H28.38C26.94 26.475 24.645 28.395 21.885 29.34ZM24.54 21C24.66 20.01 24.75 19.02 24.75 18C24.75 16.98 24.66 15.99 24.54 15H29.61C29.85 15.96 30 16.965 30 18C30 19.035 29.85 20.04 29.61 21H24.54Z"
                                        fill="#898787" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_106_59">
                                        <rect width="36" height="36" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <div class="contact-details mx-3">
                                <span style="color:#ED512D"> {{ __('site.Company website') }}</span>
                                <p class="mt-1"> <a href="www.digitaleventspro.com">www.digitaleventspro.com</a></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-left mb-5">
                            <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.9346 0H11.9814C9.85098 0 8.11426 1.73672 8.11426 3.86719V32.1328C8.11426 34.2633 9.85098 36 11.9814 36H23.9346C26.065 36 27.8018 34.2633 27.8018 32.1328V3.86719C27.8018 1.73672 26.0721 0 23.9346 0ZM16.5025 1.58906H19.4697C19.8143 1.58906 20.0885 1.90547 20.0885 2.29219C20.0885 2.67891 19.8143 2.99531 19.4697 2.99531H16.5025C16.158 2.99531 15.8838 2.67891 15.8838 2.29219C15.8838 1.90547 16.158 1.58906 16.5025 1.58906ZM13.6971 1.48359C14.14 1.48359 14.5057 1.84219 14.5057 2.29219C14.5057 2.74219 14.14 3.09375 13.6971 3.09375C13.2541 3.09375 12.8885 2.73516 12.8885 2.28516C12.8885 1.83516 13.2471 1.48359 13.6971 1.48359ZM17.9861 33.5461C17.2689 33.5461 16.6924 32.9695 16.6924 32.2523C16.6924 31.5352 17.2689 30.9586 17.9861 30.9586C18.7033 30.9586 19.2799 31.5352 19.2799 32.2523C19.2799 32.9695 18.7033 33.5461 17.9861 33.5461ZM25.5518 30.1992H10.3713V4.68281H25.5518V30.1992Z"
                                    fill="#898787" />
                            </svg>

                            <div class="contact-details mx-3">
                                <span style="color:#92599E"> {{ __('site.Mobile number') }}</span>
                                <p class="mt-1"> <a href="tel: (+966) 56 138 8363">(+966) 56 138 8363</a></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-left mb-5">
                            <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_78_949)">
                                    <path
                                        d="M28.4132 4.21883C25.6292 1.50232 21.8899 -0.0126085 18.0002 7.90556e-05C13.9277 7.90556e-05 10.2467 1.61558 7.58718 4.21883C6.22357 5.54094 5.1392 7.1233 4.39831 8.87215C3.65741 10.621 3.27507 12.5008 3.27393 14.4001C3.27393 18.6076 7.36218 24.2416 10.0239 27.0001L18.0002 36.0001L25.7739 27.0001C28.4357 24.2393 32.7287 18.6076 32.7287 14.4001C32.7266 12.5007 32.3436 10.621 31.6024 8.87226C30.8611 7.12349 29.7767 5.54114 28.4132 4.21883ZM18.0002 19.6358C17.3549 19.637 16.7158 19.5108 16.1195 19.2643C15.5231 19.0179 14.9813 18.6561 14.5252 18.1997C14.069 17.7434 13.7075 17.2014 13.4613 16.605C13.2152 16.0085 13.0892 15.3693 13.0907 14.7241C13.0907 12.0083 15.2822 9.81683 18.0002 9.81683C20.7182 9.81683 22.9097 12.0083 22.9097 14.7241C22.9112 15.3693 22.7852 16.0085 22.539 16.605C22.2929 17.2014 21.9313 17.7434 21.4752 18.1997C21.019 18.6561 20.4772 19.0179 19.8809 19.2643C19.2846 19.5108 18.6454 19.637 18.0002 19.6358Z"
                                        fill="#898787" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_78_949">
                                        <rect width="36" height="36" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                            <div class="contact-details mx-3">
                                <span style="color:#40BDEB"> {{ __('site.the address') }} </span>
                                <p class="mt-1">المملكة العربية السعودية – جدة شارع حديقة رامي
                                    – حي السلامة </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@stop
