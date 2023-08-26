<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use App\Http\Requests\Request;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {         
        // $Category_data = DB::table('categories')->get();
        // $Category_Fild=array();
        // $Category_Fild = array_unique($Category_Fild);
        $Category_Fild = "";
        echo view('header');
        echo view('category',['Category_Fild' => $Category_Fild]);
        echo view('footer');
    }

    public function create(Request $request)
    {   
        $Today_Date = date("Y-m-d H:i:s");
        $path = 'public/assets/images/Product_Image';
        if(isset($_FILES["Image"]["name"]) && !empty($_FILES["Image"]["name"]))
        {
            $fileName = time().'.'.$request->Image->extension();  
            $request->Image->move(public_path('assets\images\Product_Image'), $fileName);
        }

        $Product_Name = $_POST['Product_Name'];
        $Product_Size = $_POST['Product_Size'];
        $Colour = $_POST['Colour'];

        $Product_data = ['Product_name' => $Product_Name, 'Color' => $Colour,'Size'=>$Product_Size,'Image_Path'=>$fileName];

		Category::create($Product_data);

        return redirect('Category');
    }

    public function edit(Request $request) 
    {
		$id = $request->id;
		$product = Category::find($id);
		return response()->json($product);
	}
    
    public function update(Request $request) 
    {
        $Product_id = $request->Product_id;
        $Product_Image = $request->Product_Image;
        $Update_Product_Name = $request->Update_Product_Name;
        $Update_Product_Size = $request->Update_Product_Size;
        $Update_Colour = $request->Update_Colour;

        $Product_data = Category::find($request->Product_id);
        if(isset($_FILES["Update_Image"]["name"]) && !empty($_FILES["Update_Image"]["name"]))
        {
            $fileName = time().'.'.$request->Update_Image->extension();  
            $request->Update_Image->move(public_path('assets\images\Product_Image'), $fileName);

			if ($Product_data->Image_Path) 
            {
				Storage::delete('assets/images/Product_Image/' . $Product_Image);
			}
        }
        else
        {
            $fileName = $Product_Image;
        }

        $Product_data_Update = ['Product_name' => $Update_Product_Name, 'Color' => $Update_Colour,'Size'=>$Update_Product_Size,'Image_Path'=>$fileName];

        $Product_data->update($Product_data_Update);
        
        return redirect('Category');
    }
    
	public function delete(Request $request,$id) 
    {
		$id = $request->id;
		$Product_details = Category::find($id);
        
		Category::destroy($id);

        return redirect('Category');
	}
}
