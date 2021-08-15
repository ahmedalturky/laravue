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
        $expenses= Expenses::latest()->paginate(10);
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
}
