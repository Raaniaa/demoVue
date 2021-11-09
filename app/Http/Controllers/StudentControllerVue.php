<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Students;

class StudentControllerVue extends Controller
{
    public function index()
    {
        $products = Students::all()->toArray();
        return array_reverse($products);      
    }

    public function store(Request $request)
    {
        $product = new Students([
            'Name' => $request->input('Name'),
            'Birth_Date' => $request->input('Birth_Date'),
            'ID_Number' => $request->input('ID_Number'),
            'Mobile' => $request->input('Mobile'),
            'Address' => $request->input('Address'),
        ]);
        $product->save();

        return response()->json('Product created!');
    }

    public function show($id)
    {
        $product = Students::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Students::find($id);
        $product->update($request->all());

        return response()->json('Product updated!');
    }

    public function destroy($id)
    {
        $product = Students::find($id);
        $product->delete();

        return response()->json('Product deleted!');
    }
}