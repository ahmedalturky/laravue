<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Orders;
use App\Prodect;
use App\Http\Controllers\Controller;


class OrdesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        // return Orders::latest()->paginate(10);
        $orders= Orders::with('prodect')->latest()->paginate(10);
        $prodect= Prodect::latest()->paginate(10);
        $orders_amount= Orders::latest()->sum('payed');


        return response()->json(['orders'=>$orders,'orders_amount'=>$orders_amount,'prodects'=>$prodect]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Orders::create([
            'clint_name' => $request['clint_name'],
            'clint_address' => $request['address'],
            'clint_phone' => $request['phone'],
            'date' => $request['date'],
            'prodect_id' => $request['prodect_id'],
            'D_R_SPH' => $request['D_R_SPH'],
            'D_R_SYL' => $request['D_R_SYL'],
            'D_R_AXIS' => $request['D_R_AXIS'],
            'D_L_SPH' => $request['D_L_SPH'],
            'D_L_SYL' => $request['D_L_SYL'],
            'D_L_AXIS' => $request['D_L_AXIS'],

            'N_R_SPH' => $request['N_R_SPH'],
            'N_R_SYL' => $request['N_R_SYL'],
            'N_R_AXIS' => $request['N_R_AXIS'],
            'N_L_SPH' => $request['N_L_SPH'],
            'N_L_SYL' => $request['N_L_SYL'],
            'N_L_AXIS' => $request['N_L_AXIS'],

            'IPD' => $request['IPD'],
            'plase' => $request['plase'],
            'prise' => $request['price'],
            'discount' => $request['discount'],
            'amount_after' => $request['amount_after'],
            'payed' => $request['payed'],
            'amount_left' => $request['amount_left'],
            
            'note' => $request['note'],
            'order_type' => $request['order_type'],




       
        ]);

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orders =Orders::findOrFail($id);
        $orders->update($request->all());

        return ['message' => 'update date'];
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Orders::findOrFail($id);
        $orders->delete();
   
        return ['message' => 'expense Deletet'];    }

        public function report_date($dateone,$datetwo)
    {
        $d=date($dateone);
        $d2=date($datetwo);
   
         $users=Orders::with('prodect')->whereBetween('date',[$d.' 00:00:00',$d2.' 23:59:59'])->get();
         return response()->json(['databack'=>$users]);
    }
    public function report_money($amountone,$amountwo)
    {
         $users=Orders::with('prodect')->whereBetween('amount_left',[$amountone,$amountwo])->get();
         return response()->json(['databack'=>$users]);
    }
    public function report_prodect($prodect)
    {
         $users=Orders::with('prodect')->where('prodect_id',[$prodect])->get();
         return response()->json(['databack'=>$users]);
    }
}
