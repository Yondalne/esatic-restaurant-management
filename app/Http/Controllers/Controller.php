<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dailyMenu() {
        $menu = Menu::where('date', date('Y-m-d'))->first();
        $title = 'Menu du Jour';
        if (empty($menu)) {
            $menus = Menu::all();
            $title = "Tous les menus disponibles";
            return view('menu', compact('menus', 'title'));
        }
        return view('menu', compact('menu', 'title'));
    }

    public function order(Dish $dish) {
        $customer = Customer::all()->first();
        $customer;

        $code = '#'.rand(1, 99).'A23';
        $order = Order::create([
            'code' => $code,
            'customer_id' => $customer->id,
        ]);


        // dd($dish->id);
        $order->dishes()->attach($dish->id);
        // dd($order->dishes()->get());
        Session::flash('success', $code);
        return redirect('/');
    }
}

