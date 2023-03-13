<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\BidData;
use App\Models\Massage;
use App\Models\Activity;
use App\Models\User;
use App\Models\UserReply;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postingan = Postingan::latest()->limit(4)->get();
        if(Auth::user()->role == 'user'){
            $list_item = Postingan::where('status', 'Open')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->limit(6)->get();
        }else{
            $list_item = Postingan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->limit(6)->get();
            
        }
        $total_postingan = Postingan::all();
        $new_postingan = Postingan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $account = User::where('role', 'admin')->orWhere('role', 'officer')->get();
        $new_account = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $customer = User::where('role', 'user')->get();
        $new_customer = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $user_reply = UserReply::all();
        $your_order = BidData::where('user_id', Auth::user()->id)->distinct()->get('postingan_id');
        $new_order = BidData::where('user_id', Auth::user()->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $user_inbox = Massage::where('user_id', Auth::user()->id)->get();
        $new_user_inbox = Massage::where('user_id', Auth::user()->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

        // Chart JS
        $closed_auction = Postingan::where('status', 'Closed')->count();
        $open_auction = Postingan::where('status', 'Open')->count();
        return view('pages/home', compact(['account', 'postingan', 'user_reply', 'list_item', 'your_order', 'new_order', 'total_postingan', 'new_postingan', 'new_account', 'customer', 'new_customer', 'user_inbox', 'new_user_inbox', 'closed_auction', 'open_auction']));
    }

    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}