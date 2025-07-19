<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Catgorey;
use App\Models\Catgory;
use App\Models\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;



class productController extends Controller
{

    public function index(){
        $catParint=Catgory::get();
        return view('admin.addProduct')->with("cat_Parint",$catParint);
    }
    public function stor(Request $request){
        // $validator=Validator($request->all(),[
        //     'name'=>'required|numeric|min:3|max:15',
        //     'disc'=>'required|min:10|max:100',
        //     'image'=>'required',
        //     'qul'=>'required|numeric|min:1|max:10',
        //     'price'=>'required|numeric|min:1|max:10',
        // ],[
        //     'name'=>'الحقل مطلوب',
        //     'disc'=>'الحقل مطلوب',
        //     'image'=>'الحقل مطلوب',
        //     'qul'=>'الحقل مطلوب',
        //     'price'=>'الحقل مطلوب',
        // ]);

        // if($validator->fails())
        // return redirect()->back()->withErrors($validator->errors());

        $prouct=new Product();
        $prouct->name=$request->name;
        $prouct->discrtion=$request->disc;
        $prouct->addMediaFromRequest('image')->toMediaCollection('avtar');
        $prouct->qualty=$request->qul;
        $prouct->price=$request->price;
        $prouct->user_id=auth()->user()->id;
        $prouct->catgory_id=$request->parint;

        if($prouct->save()){
            return redirect()->back();
        }

    }
    public function listProduct()
    {
        // جلب جميع المنتجات مع الصنف المرتبط بها
        $products = Product::with('category')->get();
        
        return view('admin.listProduct', ['products' => $products]);
    }

    
    public function editProduct($id){
        $product=Product::find($id);
        $catdat=Catgory::get();
       return view('admin.editProduct',compact('catdat'))->with('data',$product);
    }

    public function updateProduct(Request $request, $id)
    {
        // 1. التحقق من وجود المنتج
        $product =Product::findOrFail($id);
    
        // 2. تصحيح أسماء الحقول
        $validatedData = $request->validate([
            'name' => 'required|string',
            'disc' => 'required|string', // تصحيح: يجب أن يكون 'description'
            'qul' => 'required|integer', // تصحيح: يجب أن يكون 'quality'
            'price' => 'required|numeric',
            'parint' => 'required|exists:catgories,id', // تصحيح: 'parent_id'
            'image' => 'sometimes|image|max:2048'
        ]);
    
        // 3. تحديث البيانات بشكل صحيح
        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['disc'], // تصحيح اسم الحقل في الموديل
            'quality' => $validatedData['qul'], // تصحيح اسم الحقل في الموديل
            'price' => $validatedData['price'],
            'user_id' => auth()->id(),
            'catgory_id' => $validatedData['parint'] // تصحيح: 'category_id'
        ]);
    
        // 4. التعامل مع الصورة بشكل صحيح
      
        if ($request->hasFile('image')) {
            $product->clearMediaCollection('avtar');
            
            $product->addMediaFromRequest('image')
                ->withResponsiveImages()
                ->toMediaCollection('avtar');
        }
    
        return redirect()->route('listProduct');
    }
    public function deleteRecordProduct($id){
        $delete=Product::destroy($id);
        if($delete){
            return redirect()->back()->with("sucess","لم يتم الحذف");
        }
        else
        {
            return redirect()->back()->with("sucess","لم يتم الحذف");



        }

    }

}
