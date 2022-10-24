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


}
