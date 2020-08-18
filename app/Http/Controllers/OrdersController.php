<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("home", [
            Order::all(),
            'title' => 'Cassovia',
            'orders' => Order::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

        ]);
        $path = NULL;
        if ($request->hasFile('files')){
            $path = $request->file('files')->store('files');
        }


        auth()->user()->orders()->create(
            array_merge($request->all(), ['file' => $path, 'user_id' => auth()->id()])
        );

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('editOrder',[
            'order' => $order,
        ]);
    }

    public function create(){
        return view('newOrder', [
            'title' => 'Cassovia',
            'name' => 'Cassovia e-Shop',
        ]);
    }

}
