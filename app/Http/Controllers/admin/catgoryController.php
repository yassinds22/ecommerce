<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catgorey;
use App\Models\Catgory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class catgoryController extends Controller
{
    // public function __construct(){

    //     $this->middleware('auth')->except(['search','index','show']);

    //   }

    public function index(){
        return view('admin.addCatgory');

    }
    public function stor(Request $request){
        // $validator=Validator($request->all(),[
        //     'name'=>'required|min:5|:max:20',
        //     'image'=>'required',
        //     'disc'=>'required|main:10|:max:10'
        // ],[
        //     'name.required'=>'الحقل مطلوب',
        //     'image.required'=>'الصورة مطلوبة',
        //     'disc.required'=>'الحقل مطلوبة',
        // ]);
        // if($validator->fails())
        // return redirect()->back()->withErrors($validator->errors());
        $cat=new Catgory();

        $cat->name=$request->name;
        $cat->addMediaFromRequest('image')->toMediaCollection('images');
       // $cat->addMediaFromRequest('image')->toMediaCollection('image');
        $cat->parint=$request->parint;
        $cat->discrption=$request->disc;

        if($cat->save()){
            return redirect()->back();
        }

    }

    public function show(){
        $catgorey=Catgory::get();
        return response()->json($catgorey);
       return view('admin.listCatcgory')->with("allCatgory",$catgorey);
     

    }
    //--------------------
    public function showcatgoryApi()
{
    // جلب الفئات مع الوسائط المرفقة (تحميل علاقات مسبقاً)
    $categories = Catgory::with('media')->get();

    // التحقق من وجود بيانات
    if ($categories->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No categories found'
        ], 404);
    }

    // تحويل البيانات مع إضافة الصور
    $formattedCategories = $categories->map(function ($category) {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
            'image_url' => $category->getFirstMediaUrl('images') ?? null,
        ];
    });

    // إرجاع الاستجابة بشكل منظم
    return response()->json([
        
        'catgory' => $formattedCategories,
        
    ], 200);
}

    //------------------

    // public function showcatgoryApi()
    // {
    //     // استرجاع جميع الفئات
    //     $categories = Catgory::all();
    
    //     // التحقق إذا كانت البيانات فارغة
    //     if ($categories->isEmpty()) {
    //         return response()->json([
    //             'message' => 'No categories found'
    //         ], 404);
    //     }
    
    //     // خريطة البيانات مع إضافة روابط الصور
    //     $categoriesWithImages = $categories->map(function ($category) {
    //         // إرجاع البيانات مع روابط الصور
    //         return  [
    //             'id' => $category->id,
    //             'name' => $category->name,
    //             'description' => $category->description,
    //             'image_url' => $category->getFirstMediaUrl('images'), // الحصول على رابط الصورة
    //         ];
    //     });
    
    //     // إرجاع الفئات مع الصور
    //     return response()->json($categoriesWithImages, 200);
    // }
    




    
   
    public function editCatgory($id){
        $cat=Catgory::find($id);
        return view('admin.editCatgory')->with('data',$cat);
        dd($cat);

    }
    public function updateCategory(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parint' => 'nullable|integer',
            'discrption' => 'nullable|string',
            'image' => 'sometimes|image|max:2048'
        ]);
    
        $category = Catgory::findOrFail($id);
        
        $category->update($validated);
    
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('images');
            
            $category->addMediaFromRequest('image')
                ->withResponsiveImages()
                ->toMediaCollection('images');
        }
    
        return redirect()->back();
            // ->with('success', 'تم تحديث التصنيف بنجاح');
    }
    public function deleteRecordCatgory($id){
        $deleteCatgory=Catgory::destroy($id);
        if($deleteCatgory){
            return redirect()->back()->with("sucess","لم يتم الحذف");
        }
        else
        {
            return redirect()->back()->with("sucess","لم يتم الحذف");



        }
    }
    //
}
