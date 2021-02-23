<?php

namespace App\Http\Controllers\User;
use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource; 
use Illuminate\Support\Facades\DB;
class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->collectionResponse(UserResource::collection($this->getModel(new User, [])));
  
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
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
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $this->api_success([
            'data' => new UserResource($user),
            'message' => __('pages.responses.delete'),
            'code' => 200
        ], 200);
    }


    public function getEmail(){

        
    }

    
    public function count(){
        $countUser = DB::table('users')->count();
        $countSinfa = DB::table('users_sinfa')->count();
        $countPqr = DB::table('pqrs')->count();
        $countPoints = DB::table('points_pays')->count();
        return $this->api_success([
            'data' => $countUser,
            'dataSinfa' => $countSinfa,
            'dataPqr' => $countPqr,
            'dataPoints' => $countPoints,
            'code' => 200
        ], 200);
    }
}
