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
        $list_item = Postingan::latest()->limit(6)->get();
        $account = User::all();
        $user_reply = UserReply::all();
        $your_order = BidData::where('user_id', Auth::user()->id)->distinct()->get('postingan_id');
        $new_order = BidData::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        return view('pages/home', compact(['account', 'postingan', 'user_reply', 'list_item', 'your_order', 'new_order']));
    }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}