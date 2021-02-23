<?php

namespace App\Http\Controllers\PQR;
use App\Http\Resources\PqrResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\Pqr; 
use Illuminate\Support\Facades\DB;
class PqrController extends ApiController
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

       $pqr = new Pqr;
       $pqr->fill($request->all());
       $pqr->saveOrFail();
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

   public function showNoAnswered()
   {
       $pqrs=Pqr::where('status','=', '0')->get();
       return response()->json([
        'data'=>$pqrs
    ]);
   }

   public function count(){
    $count = DB::table('pqrs')->count();
    return $this->api_success([
        'data' => $count,
        'code' => 200
    ], 200);
}
}
