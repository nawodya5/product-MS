<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class addItemController extends Controller
{
    
    //view the itemsS
    public function index(){

        $items = Items::all();
        return view('items.add_items',compact('items'));

    }




    // add new items
    public function addItem(Request $request){

        // validate the request
        $validatedData = $request->validate([
            'item_name'=>'required|string|max:255',
            'supplier'=>'required|string|max:255',
            'quantity'=>'required|integer',
            'description'=>'string',
            
        ]);

        // save new item to the table
        $item = Items::create([
            'item_name' => $validatedData['item_name'],
            'supplier'=> $validatedData['supplier'],
            'quantity'=> $validatedData['quantity'],
            'description'=>$validatedData['description']

        ]);
        
        return redirect()->back()->with('Success','Added Item Succesfully');
    }




    // view edit item 
    public function editItem($id) {
        $item = Items::findOrFail($id);
        return view('items.edit_item', compact('item'));
    }




    // update the item
    public function updateItem(Request $request, $id){

        // validate the request
        $validatedData = $request->validate([
            'item_name'=>'required|string|max:255',
            'supplier'=>'required|string|max:255',
            'quantity'=>'required|integer',
            'description'=>'string'
            
        ]);


        // update item to the table
        $item = Items::findOrFail($id);
        $item ->update([
            'item_name' => $validatedData['item_name'],
            'supplier'=> $validatedData['supplier'],
            'quantity'=> $validatedData['quantity'],
            'description'=> $validatedData['description']

        ]);
        
        return redirect('viewAddItems')->with('success','updated Item Succesfully');    
    }

    // delete the item
    public function deleteItem($id){

        $item = Items::findOrFail($id);
        $item -> delete();
        return redirect()->back()->with('success','Deleted Successfully');
        
    }


    // method for get item description using ajax
    public function getItemDescription($id)
    {
        $item = Items::find($id);
        if ($item) {
            return response()->json(['description' => $item->description]);
        }
        return response()->json(['error' => 'Item not found'], 404);
    }
}
