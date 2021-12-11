<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Prodect;

use App\Http\Controllers\Controller;

class ProdectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodect= Prodect::latest()->paginate(5);
        $prodect_total= Prodect::latest()->count();
        return response()->json(['prodect'=>$prodect,'prodect_total'=>$prodect_total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Prodect::create([
            'name' => $request['name'],
            'company' => $request['company'],
            'price' => $request['price'],
            'date' => $request['date'],
            'Details' => $request['Details'],
       
        ]);    }

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
        $prodect =Prodect::findOrFail($id);
        $prodect->update($request->all());

        return ['message' => 'update date'];    }
    public function search()
        {
            if ($search= \Request::get('q')){
                $prodect=Prodect::where(function($query) use ($search){
                    $query->where('name','LIKE',"%$search%");
                })->paginate(5);
            }else{
                $prodect= Prodect::latest()->paginate(5);
            }

            return $prodect;    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodect = Prodect::findOrFail($id);
        $prodect->delete();
   
        return ['message' => 'prodect Deletet'];    }
        public function report_date($dateone,$datetwo)
        {
            $d=date($dateone);
            $d2=date($datetwo);
       
             $users=Prodect::whereBetween('date',[$d.' 00:00:00',$d2.' 23:59:59'])->get();
             return response()->json(['databack'=>$users]);
        }
        public function report_pro()
    {
        $prodects= Prodect::get();
         return response()->json(['databack'=>$prodects]);
    }
}
