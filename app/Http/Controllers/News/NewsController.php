<?php

namespace App\Http\Controllers\News;
use App\Http\Resources\NewResource;
use App\Http\Requests\UpdateNewRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Storage;
use App\Models\News; 
use Carbon\Carbon;

class NewsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->collectionResponse(NewResource::collection($this->getModel(new News, [])));
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
        if ($request->has("id")) {
            $news = News::findOrFail($request->id);
            $news->fill($request->all());
            $news->id=$request->id;
        }else{
            $news = new News;  
            $news->fill($request->all());
        }
       
        if ($request->hasFile('url_image')) {
            $news->url_image = $request->url_image->store('images');
        }
        $news->saveOrFail();

        return $this->api_success([
            'data'      =>  $request,
            'message'   => __('pages.responses.updated'),
            'code'      =>  201
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
        $news = News::findOrFail($id);
        return $news;
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
    public function update(Request $request,News $news)
    {
 
        if ($request->has("title")) {
            $news->title = $request->title;
        }
        if ($request->has("autor")) {
            $news->autor = $request->autor;
        }
        if ($request->has("content")) {
            $news->content = $request->content;
        }
        if ($request->has("url_resource")) {
            $news->url_resource = $request->url_resource;
        }
        if ($request->hasFile('url_image')) {
            Storage::delete($news->url_image);
            $news->url_image = $request->url_image->store('images');
        }
      
        $news->saveOrFail();
        return $this->api_success([
            'data1'      =>  array_filter($request->all()),
            'data2'      =>  $news,
            'message'   => __('pages.responses.updated'),
            'code'      =>  201
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return $this->api_success([
            'data' => new NewResource($news),
            'message' => __('pages.responses.delete'),
            'code' => 200
        ], 200);
    }
}
