<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fee_category; 


class fee_category_controller extends Controller
{
    public function view_fee_cat(){
        $data['all_data'] = fee_category::all();
        return view('backend.setup.fee_category.view_fee_cat',$data);
    }

    public function add_fee_cat(){
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function store_fee_cat(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
            
        ]);

        $data = new fee_category();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee category added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($notification);

    }

    public function edit_fee_cat($id){
        $edit_data = fee_category::find($id);
        return view('backend.setup.fee_category.edit_fee_category',compact('edit_data'));
    }

    public function update_fee_cat(Request $request, $id){
        $data = fee_category::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:fee_categories,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Fee category updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('fee.category.view')->with($notification);
    }

    public function delete_fee_cat($id){
        $user = fee_category::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Fee Category deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.category.view')->with($notification);

    }
}
