<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Image;
    use Carbon\Carbon;
    use App\Models\Evenement;
    use Illuminate\Support\Facades\File;

class EvenementController extends Controller
{
    //

        public function AllEvenement(){
            $evenements=Evenement::all();
            return view('Evenement.BackOffice.AllEvenement')->with('evenements',$evenements);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function AddEvenement(Request $request){


            if($request->hasFile("image")){
                $file=$request->file("image");
                $imageName=time().'_'.$file->getClientOriginalName();
                $file->move(\public_path("cover/"),$imageName);

                $Evenement =new Evenement([
                'title' => $request->title,
                'description' =>$request->description,
                'date' =>$request->date,
                'capacite' =>$request->capacite,
                'image' => $imageName,

                ]);
            $Evenement->save();
            }

            return redirect("/evenement/all");



        }


        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Evenement  
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
        $evenements=Evenement::findOrFail($id);
            return view('Evenement.BackOffice.EditEvenement')->with('evenements',$evenements);
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
        $evenements=Evenement::findOrFail($id);
        if($request->hasFile("image")){
            if (File::exists("cover/".$evenements->image)) {
                File::delete("cover/".$evenements->image);
            }
            $file=$request->file("image");
            $evenements->image=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"),$evenements->image);
            $request['image']=$evenements->image;
        }

            $evenements->update([
                'title' => $request->title,
                'description' =>$request->description,
                'date' =>$request->date,
                'capacite' =>$request->capacite,
                'image' => $evenements->image,

            ]);

    

            return redirect("/evenement/all");

        }





        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Evenement  
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $evenements=Evenement::findOrFail($id);

            if (File::exists("cover/".$evenements->image)) {
                File::delete("cover/".$evenements->image);
            }
        
            $evenements->delete();
            return back();


        }
}
