<?php

namespace App\Http\Controllers;

use App\Models\ClubCreation;
use App\Models\ProductCreation;
use Illuminate\Http\Request;
use App\Http\Requests\validationrules;

use Exception;
use GuzzleHttp\Psr7\Response;

use function Ramsey\Uuid\v1;
class ProductCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        
        // if($request->ajax()){
            $clubs_data=ClubCreation::get();
            if($request->ajax()){
                $product_details=ProductCreation::get();
         
                   return response($product_details);
                // return view('ProductCreation.list',compact('$product_details','$clubs_data'));
        }
        return view('ProductCreation.list',compact('clubs_data'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //    $clubs_data=ClubCreation::get();

        //   return view('ProductCreation.list',compact('clubs_data'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            ProductCreation::create([
                "club_id" => $request->club_id_one,
                "title" => $request->title,
                "product_title" => $request->product_title,
                "type" => $request->type,
               
            ]);
            return response(true);
        }
        catch (Exception $e) {
            return $e->getMessage();
        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCreation $productCreation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        // dd($request->all());
        // dd($id);
        $product = ProductCreation::find($id);
        if($product)
        {
            
            return response()->json([
                'status'=>200,
                'product'=> $product,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No product Found.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)   
    {
        //
        $product = ProductCreation::find($id);
        // dd($club);
        if($product)
        {
                $product->club_id=$request->input('club_id');
                $product->title=$request->input('title');
                $product->product_title= $request->input('product_title');
                $product->type= $request->input('type');
                $product->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'PRODUCT Updated Successfully.'
                ]);
        }

        else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No product Found.'
                ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product_details = ProductCreation::find($id);
         if ($product_details) {
            $product_details->delete();
        }
        return response()->json($product_details); 

    }
}
