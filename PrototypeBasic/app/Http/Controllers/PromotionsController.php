<?php

namespace App\Http\Controllers;
use App\Models\Promotion;

use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    protected function index()
    {
        $promotions = Promotion::all();

        return view('index', [
            'promotions' => $promotions
        ]);
    }

    protected function create()
    {
        return view('create');
    }

    protected function store(Request $request)
    {
        $title = $request->input('title');

        Promotion::create([
            'title' => $title
        ]);

        return redirect('/');
    }

}
