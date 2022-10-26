<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use App\Models\Apprenant;

use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    protected function index()
    {
        $promotions = Promotion::all();

        return view('promotions.index', [
            'promotions' => $promotions
        ]);
    }

    protected function create()
    {
        return view('promotions.create');
    }

    protected function store(Request $request)
    {
        $request->validate(['name'=>'Required'
        ]);
        $promotion= new Promotion();
        $promotion->name = $request->input('name');
        $promotion->save();

        return redirect()->route('promotions.index');
    }
    protected function edit($id)
    {
        $apprenant = Apprenant::select("*")->where('PromotionID',$id)->get();
        return view('promotions.edit',['promotion'=>Promotion::findOrFail($id),'apprenants'=>$apprenant]);

    }

    protected function update(Request $request,$id)
    {
        $promotion=Promotion::findOrFail($id);
        $promotion->name =strip_tags( $request->input('name'));
        $promotion->save();
        return redirect()->route('promotions.index');
    }

    public function destroy($promotion)
    {
        $todelete=Promotion::findOrFail($promotion);
        $todelete->delete();
        return redirect(route('promotions.index'));
    }

    public function search(Request $request){
        
            $output="";
            $promotions=Promotion::where('name','LIKE','%'.$request->search."%")->get();
            
                foreach($promotions as $promotion){
                    $output.='<tr>
            <td> '.$promotion->name.' </td>
           
            <td>'.'<a href="/promotions/'.$promotion['id'].'/edit">'.'<button>update</button></a>'.'</td>
            <td>'.'<form method="post" action="'.route('promotions.destroy',$promotion->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" >Delete</button>
            </form>'.'</td>
            </tr>';
                   
                }
                return response($output);

            }
        }

