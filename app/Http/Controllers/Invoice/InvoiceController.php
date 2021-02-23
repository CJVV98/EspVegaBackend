<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Http\Controllers\Api\ApiController;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class InvoiceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Invoice::all();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $code = (int) $request->code;
        $date = $request->date;
        $invoice = Invoice::where('code','=', $code)
                          ->where('date_issue','=', $date)->first();
        return response()->json([
            'data'=>$invoice
        ]);
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
        //
    }

    /**
     * 
     */

    public function showInvoices($code)
    {
        $invoices = Invoice::where('code','=', $code)->get();
        return response()->json([
            'data'=>$invoices
        ]);
    }

    public function consultNotification($code)
    {
        $date=Carbon::now();
        $dateinitial=Carbon::now();
        $dateinitial=$dateinitial->addDay(5);
   
        $invoices = Invoice::where(DB::raw("STR_TO_DATE(date_issue, '%d/%m/%Y')"), '<', $dateinitial->toDateString())->where(DB::raw("STR_TO_DATE(date_issue, '%d/%m/%Y')"), '>=', $date->toDateString())
                            ->where('code', '=', $code)->get();
        return response()->json([
            'data'=>$invoices,
            'data2'=>$dateinitial,
            'data3'=>$code,
        ]);
    }
}
