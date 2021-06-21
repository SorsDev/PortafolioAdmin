<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AllCat()
    {
        $categories = Category::latest()->paginate(3);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        //$categories = DB::table('categories')->latest()->paginate(3);
        return view('admin.category.index', compact('categories','trashCat'));

    }

    public function AddCate(Request $request)
    {
        $validatedData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255'
            ],
            [
                'category_name.required' => 'Por favor ingrese el nombre de la categoría',
            ]
        );

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        /*$category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();*/
        return Redirect()->back()->with('success','Categoria insertado correctamente');
    }

    public function EditCate($id){
        //$categories = Category::findOrFail($id); // Eloquent ORM
        $categories = DB::table('categories')->where('id',$id)->first(); //Query Builder
        return view('admin.category.edit',compact('categories'));
    }

    public function UpdateCate(Request $request, $id){
      /*  $update = Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);*/
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = AUth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

        return Redirect()->route('all.category')->with('success','Categoría actualizado correctamente');
    }



    public function SoftDelete($id){
        $delete = Category::findOrFail($id)->delete();
        return Redirect()->back()->with('success','Categoría eliminado correctamente');
    }

    public function RestoreCat($id){
        $delete = Category::withTrashed()->findOrFail($id)->restore();
        return Redirect()->back()->with('success','Categoría restaurado correctamente');
    }

    public function PdeleteCat($id){
        $delete = Category::onlyTrashed()->findOrFail($id)->forceDelete();
        return Redirect()->back()->with('success','Categoría Eliminado permanentemente');
    }

}
