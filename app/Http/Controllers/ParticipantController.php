<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Participant;
use App\Models\Balade;
use Illuminate\Support\Facades\File;


class ParticipantController extends Controller
{
    //
    public function AllParticipant(){
        // $balades=Balade::all();
        $participants=Participant::all();
        return view('Participant.BackOffice.AllParticipant', compact('participants'));
     }

     public function createParticipant()
   {

      $balades = Balade::all();

      return view('Participant.BackOffice.AddParticipant', compact('balades'));
   }

 

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddParticipant(Request $request)
    {
        if($request->hasFile("imageParticipant")){
            $file=$request->file("imageParticipant");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("coverParticipant/"),$imageName);

 
       $Balade = Balade::findOrFail($request->balade_id);
       $Balade->ParticipantBalade()->create([
          'balade_id' => $request->balade_id,
          'NomParticipant' => $request->NomParticipant,
          'PrenomParticipant' =>$request->PrenomParticipant,
          'MailParticipant' =>$request->MailParticipant,
          'EtatPhysique' =>$request->EtatPhysique,    
          'imageParticipant' => $imageName,
          'numParticipant' =>$request->numParticipant,
          'AgeParticipant' =>$request->AgeParticipant,
       ]);
 
       return redirect("/participant/all");    }}

    //  public function AddParticipant(Request $request){

    //     $balades=Balade::all();
        // if($request->hasFile("imageParticipant")){
        //     $file=$request->file("imageParticipant");
        //     $imageName=time().'_'.$file->getClientOriginalName();
        //     $file->move(\public_path("coverParticipant/"),$imageName);

    //         $Participant =new Participant([
            // 'NomParticipant' => $request->NomParticipant,
            // 'PrenomParticipant' =>$request->PrenomParticipant,
            // 'MailParticipant' =>$request->MailParticipant,
            // 'EtatPhysique' =>$request->EtatPhysique,    
            // 'imageParticipant' => $imageName,
            // 'numParticipant' =>$request->numParticipant,
            // 'AgeParticipant' =>$request->AgeParticipant,
    //         'balade_id' =>$request->balade_id,

          
    //         ]);
    //        $Participant->save();
    //     }

    //     return redirect("/participant/all");



    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $balades = Balade::all();

       $participants=Participant::findOrFail($id);
        return view('Participant.BackOffice.EditParticipant', compact('balades'))->with('participants',$participants);
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
     $participants=Participant::findOrFail($id);
     if($request->hasFile("imageParticipant")){
         if (File::exists("coverParticipant/".$participants->imageParticipant)) {
             File::delete("coverParticipant/".$participants->imageParticipant);
         }
         $file=$request->file("image");
         $participants->imageParticipant=time()."_".$file->getClientOriginalName();
         $file->move(\public_path("/coverParticipant"),$participants->imageParticipant);
         $request['image']=$participants->imageParticipant;
     }

        $participants->update([
            'NomParticipant' => $request->NomParticipant,
            'PrenomParticipant' =>$request->PrenomParticipant,
            'MailParticipant' =>$request->MailParticipant,
            'EtatPhysique' =>$request->EtatPhysique,    
            'imageParticipant' =>  $participants->imageParticipant,
            'numParticipant' =>$request->numParticipant,
            'AgeParticipant' =>$request->AgeParticipant,
            'balade_id' =>$request->balade_id,

        ]);

   

        return redirect("/participant/all");

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenement  
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $participants=Participant::findOrFail($id);

         if (File::exists("cover/".$participants->image)) {
             File::delete("cover/".$participants->image);
         }
    
         $participants->delete();
         return back();


    }

}
