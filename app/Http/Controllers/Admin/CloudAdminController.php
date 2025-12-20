<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class CloudAdminController extends Controller
{
    public function __construct()
    {
        // Simple password protection
        $this->middleware(function ($request, $next) {
            if ($request->session()->get('admin_auth') !== true) {
                return redirect()->route('cloud-admin.login');
            }
            return $next($request);
        })->except(['login', 'postLogin']);
    }

    public function login()
    {
        return view('admin.cloud-login');
    }

    public function postLogin(Request $request)
    {
        $password = env('ADMIN_PASSWORD', 'admin123');
        
        if ($request->password === $password) {
            $request->session()->put('admin_auth', true);
            return redirect()->route('cloud-admin.dashboard');
        }

        return back()->with('error', 'Password salah');
    }

    public function dashboard()
    {
        $orders = Order::with('customer', 'status')
            ->latest()
            ->paginate(20);

        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');
        $pendingOrders = Order::where('status_id', 1)->count();

        return view('admin.cloud-dashboard', compact('orders', 'totalOrders', 'totalRevenue', 'pendingOrders'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_auth');
        return redirect()->route('cloud-admin.login');
    }
}
