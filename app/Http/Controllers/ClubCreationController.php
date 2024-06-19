<?php

namespace App\Http\Controllers;

use App\Models\ClubCreation;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class ClubCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $club_details=ClubCreation::get();
        // return response($club_details);
    if($request->ajax()){
        $club_details=ClubCreation::get();
        
        return response($club_details);
    }
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('ClubCreation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('club_logo');
    $clublogo = $file->getClientOriginalName();
    $filePath = $file->move(public_path('images'), $clublogo);

        
        $file1 = $request->file('club_banner');
        $clubbanner = $file1->getClientOriginalName();
        $filePath = $file1->move(public_path('images'), $clubbanner);
    //   dd('adsasd');
    try{
        ClubCreation::create([
            "group_id" => $request->group_id,
            "business_name" => $request->business_name,
            "club_number" => $request->club_number,
            "club_name" => $request->club_name,
            "club_state"=>$request->club_state,
            "club_description"=>$request->club_descriptions,
            "club_slug"=>$request->club_slug,
            "website_title"=>$request->website_title,
            "website_link"=>$request->website_link,
            "club_logo"=>$clublogo,
            "club_banner"=>$clubbanner,
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
    public function show(ClubCreation $clubCreation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $club = ClubCreation::find($id);
        if($club)
        {
            return response()->json([
                'status'=>200,
                'club'=> $club,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No club Found.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('club_logo');
        // dd($file);
        $file1 = $request->file('club_banner');
        $club = ClubCreation::find($id);
        $clublogo = $file->getClientOriginalName();
        $clubbanner = $file1->getClientOriginalName();
        $file->move(public_path('images'), $clublogo);
        $file1->move(public_path('images'), $clubbanner);
        $club->update($request->input());
        // dd($clubbanner);
        
        $club->update([
            "club_logo"=>$clublogo,
            "club_banner"=>$clubbanner
        ]);
        $club->save();
        return response()->json([
            'status'=>200,
            'message'=>'club Updated Successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
        $club_details = ClubCreation::find($id)->delete();
        
        return response()->json($club_details);
  
    }
        
}
