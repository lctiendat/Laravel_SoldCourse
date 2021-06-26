<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        return $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->create_to != '' && $request->create_to != '' &&  $request->status == '') {
            $orderList = Order::whereBetween('created_at', [$request->create_from, $request->create_to])->get();
            return view('admin.orders.index', compact('orderList'));
        } elseif ($request->create_to != '' && $request->create_to != '' && $request->status != '') {
            $orderList = Order::where('status', $request->status)->whereBetween('created_at', [$request->create_from, $request->create_to])->get();
            return view('admin.orders.index', compact('orderList'));
        } elseif ($request->create_to == '' && $request->create_to == '' && $request->status != '') {
            $orderList = Order::where('status', $request->status)->get();
            return view('admin.orders.index', compact('orderList'));
        } else {
            $orderList = Order::all();
            return view('admin.orders.index', compact('orderList'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $order = $this->orderRepository->find($id);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = $this->orderRepository->find($id);
        $order->update($request->only('status'));
        Session::flash('success', trans('pagination.update') . ' ' . trans('pagination.success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderRepository->delete($id);
        Session::flash('success', trans('pagination.update') . ' ' . trans('pagination.success'));
        return redirect()->back();
    }
}
