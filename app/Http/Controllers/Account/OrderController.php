<?php

namespace App\Http\Controllers\Account;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $orders = Auth()->user()->orders()->paginate(3);
        return view('account.order.index', [
            'orders' => $orders
        ]);
    }
    /**
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Order $order)
    {
        return view('account.order.show', [
                'order' => $order
            ]
        );
    }

    public function store(Request $request)
    {
        //
    }

}
