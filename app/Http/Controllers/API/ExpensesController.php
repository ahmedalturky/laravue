<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Expenses;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses= Expenses::latest()->paginate(5);
        $expenses_total= Expenses::latest()->sum('amount');
        return response()->json(['expenses'=>$expenses,'expenses_total'=>$expenses_total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Expenses::create([
            'name' => $request['name'],
            'amount' => $request['amount'],
            'date' => $request['date'],
            'details' => $request['details'],
       
        ]);
    }

    public function search()
    {
        if ($search= \Request::get('q')){
            $expenses=Expenses::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")->
                orwhere('amount','LIKE',"%$search%");
            })->paginate(5);
        }else{
            $expenses= Expenses::latest()->paginate(5);
        }

        return $expenses;    }

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
        $expenses =Expenses::findOrFail($id);
        $expenses->update($request->all());

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
        $expense = Expenses::findOrFail($id);
        $expense->delete();
   
        return ['message' => 'expense Deletet'];
    }
    public function report_date($dateone,$datetwo)
    {
        $d=date($dateone);
        $d2=date($datetwo);
   
         $users=Expenses::whereBetween('date',[$d.' 00:00:00',$d2.' 23:59:59'])->get();
         return response()->json(['databack'=>$users]);
    }
    public function report_money($amountone,$amountwo)
    {
         $users=Expenses::whereBetween('amount',[$amountone,$amountwo])->get();
         return response()->json(['databack'=>$users]);
    }
    public function report_ex()
    {
         $users=Expenses::all();
         return response()->json(['databack'=>$users]);
    }
}
