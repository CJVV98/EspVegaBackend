<?php

namespace App\Http\Controllers\PQR;
use App\Models\Pqr; 
use App\Models\PqrAnswered; 
use Illuminate\Http\Request;
use App\Notifications\PqrEmail;
use App\Http\Controllers\Api\ApiController;
class PqrAnsweredController extends ApiController
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return $this->collectionResponse(PqrResource::collection($this->getModel(new Pqr, [])));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
   
       $pqr = new PqrAnswered;
       $pqr->fill($request->all());
       $pqr->saveOrFail();
       $pqr_sol=Pqr::findOrFail($pqr->pqr_id);
       $pqr_sol->status=1;
       $pqr_sol->save();
       $pqr->email=$pqr_sol->email;
       $pqr->notify(new PqrEmail($pqr));
          return $this->api_success([
           'message' => __('pages.responses.created'),
           'code' => 201
       ], 201);
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Pqr $pqr)
   {
       $pqr->delete();
       return $this->api_success([
           'message'   => __('Eliminacion exitosa'),
           'code'      =>  200
       ], 200);
   }
}
