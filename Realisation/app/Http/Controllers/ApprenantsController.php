<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprenant;




class ApprenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('promotions.insert',["id" => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apprenant=new Apprenant();
        $apprenant->Prenom=$request->input('Prenom');
        $apprenant->Nom=$request->input('Nom');
        $apprenant->Email=$request->input('Email');
        $apprenant->PromotionID=$request->input('PromotionID');
        $apprenant->save();
        return redirect()->route('promotions.edit', $apprenant->PromotionID);
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
        $index=Apprenant::findOrFail($id);

        return view('promotions.editApprenant',[
            'apprenant'=>$index
        ]);
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
        $forupdate =Apprenant::findOrFail($id);
        $forupdate->Prenom=$request->input('Prenom');
        $forupdate->Nom=$request->input('Nom');
        $forupdate->Email=$request->input('Email');
        $forupdate->PromotionID=$request->input('PromotionID');
        $forupdate->save();
        return redirect()->route('promotions.edit', $forupdate->PromotionID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todelete=Apprenant::findOrFail($id);
        $todelete->delete();
        return redirect()->route('promotions.edit', $todelete->PromotionID);
    }

    public function search1(Request $request){
        $output="";
        $id = $request->PromotionID;
        $apprenant=Apprenant::where('Prenom','Like','%'.$request->search.'%')->where('PromotionID', $id)->get();

        foreach($apprenant as $item)
        {
            $output.=
            '<tr>
            <td> '.$item->Prenom.' </td>
            <td> '.$item->Nom.' </td>
            <td> '.$item->Email.' </td>
            <td>'.'<a href="/promotions/editApprenant/'.$item['id'].'">'.'<button>update</button></a>'.'</td>
            <td>'.'<form method="post" action="'.route('gestionstud.destroy',$item->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" >Delete</button>
            </form>'.'</td>
            </tr>';
        }
        return response($output);
    }

}
