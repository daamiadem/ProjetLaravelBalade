<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Balade;
use App\Models\Participant;

use Illuminate\Support\Facades\File;
class BaladeController extends Controller
{
    //
    public function AllBalade(){
        $balades=Balade::all();
        return view('Balade.BackOffice.AllBalade')->with('balades',$balades);
     }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function AddBalade(Request $request){


        if($request->hasFile("imageDescBalade")){
            $file=$request->file("imageDescBalade");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("coverBalade/"),$imageName);

            $Balade =new Balade([
            'titleBalade' => $request->titleBalade,
            'descriptionBalade' =>$request->descriptionBalade,
            'dateBalade' =>$request->dateBalade,
            'capaciteBalade' =>$request->capaciteBalade,    
            'imageDescBalade' => $imageName,
            'MoyensBalade' =>$request->MoyensBalade,
            'Destination' =>$request->Destination,
            'ParticipanrBalade' => $request->ParticipanrBalade,
            ]);
           $Balade->save();
        }

        return redirect("/balade/all");



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $balades=Balade::findOrFail($id);
        return view('Balade.BackOffice.EditBalade')->with('balades',$balades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     $balades=Balade::findOrFail($id);
     if($request->hasFile("imageDescBalade")){
        if (File::exists("coverBalade/".$balades->imageDescBalade)) {
            File::delete("coverBalade/".$balades->imageDescBalade);
        }
        $file=$request->file("image");
        $balades->imageDescBalade=time()."_".$file->getClientOriginalName();
        $file->move(\public_path("/coverBalade"),$balades->imageDescBalade);
        $request['image']=$balades->imageDescBalade;
     }

        $balades->update([
            'titleBalade' => $request->titleBalade,
            'descriptionBalade' =>$request->descriptionBalade,
            'dateBalade' =>$request->dateBalade,
            'capaciteBalade' =>$request->capaciteBalade,    
            'imageDescBalade' => $balades->imageDescBalade,
            'MoyensBalade' =>$request->MoyensBalade,
            'Destination' =>$request->Destination,
            'ParticipanrBalade' => $request->ParticipanrBalade,

        ]);

   

        return redirect("/balade/all");

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $balades=Balade::findOrFail($id);

        if (File::exists("coverBalade/".$balades->image)) {
            File::delete("coverBalade/".$balades->image);
        }
   

        $Participant= Participant::where('balade_id', $id)->get();
        $Participant->each->delete();

        $balades->delete();
        return back();



    }

}
