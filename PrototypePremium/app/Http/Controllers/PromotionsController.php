<?php

namespace App\Http\Controllers;
use App\Models\Promotion;

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
        $promotion= new Promotion();
        $promotion->title = $request->input('title');
        $promotion->save();

        // Promotion::create([
        //     'title' => $title
        // ]);X

        return redirect()->route('promotions.index');
    }
    protected function edit($promotion)
    {
        return view('promotions.edit',['promotion'=>Promotion::findOrFail($promotion)]);
    }

    protected function update(Request $request,$id)
    {
        $promotion=Promotion::findOrFail($id);
        $promotion->title =strip_tags( $request->input('title'));
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
            $promotions=Promotion::where('title','LIKE','%'.$request->search."%")->get();
            
                foreach($promotions as $promotion){
                    $output.='<tr>
            <td> '.$promotion->title.' </td>
           
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

