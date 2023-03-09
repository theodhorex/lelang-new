<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\User;
use App\Models\GambarPostingan;
use App\Models\BidData;
use App\Models\Massage;
use App\Models\Activity;
use App\Models\UserReply;

use Redirect;
use Image;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    // CRUD Function

    public function formPages(){
        return view('pages/form');
    }

    public function formPagesSend(Request $request){
        $postingan = new Postingan;
        $activity = new Activity;

        $postingan -> user_id = Auth::user()->id;
        $postingan -> title = $request -> title;
        $postingan -> status = 'Open';
        $postingan -> subtitle = $request -> subtitle;
        $postingan -> location = $request -> location;
        $postingan -> descandcond = $request -> descandcond;
        $postingan -> category = $request -> category;
        
        $lel = explode('-', $request -> endauc);
        $endauc = $lel[1] . '/' . $lel[2] . '/' . $lel[0];
        $postingan -> endauc = $this -> dateConvert($endauc);
        $postingan -> start_price = $this -> moneyFormat($request -> startprice);

        if($request -> hasFile('uploadFile')){
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents($request -> file('uploadFile')));
            $postingan -> gambar = $image;
        }

        // Untuk activity table
        $activity -> user_id = Auth::user()->id;
        $activity -> keterangan = 'Post ' . '"' . $request -> title . '"';
        $activity -> save();
        
        $postingan -> save();
        return redirect('/home');
    }

    public function postinganDetails($id){
        $postingans = Postingan::find($id);
        $data_bid = BidData::where('postingan_id', $id)->with('user')->orderByRaw('CAST(REPLACE(bid, ",", "") AS UNSIGNED) DESC')->limit(5)->get();
        $suggestion = Postingan::where('category', $postingans->category)->limit(6)->get();
        return view('pages/ajax/postinganDetails', compact(['postingans', 'data_bid', 'suggestion']));
    }

    public function postinganDetailsUpdate(Request $request, $id){
        $postinganss = Postingan::find($id);
        $activity = new Activity;

        $postinganss -> title = $request -> title;
        $postinganss -> subtitle = $request -> subtitle;
        $postinganss -> location = $request -> location;
        $postinganss -> descandcond = $request -> descandcond;

        $lel = explode('-', $request -> endauc);
        $endauc = $lel[1] . '/' . $lel[2] . '/' . $lel[0];
        $postinganss -> endauc = $this -> dateConvert($endauc);
        $postinganss -> start_price = $request -> start_price;
        $postinganss -> update();

        // Untuk activity table
        $activity -> user_id = Auth::user()->id;
        $activity -> keterangan = 'Update post ' . '"' . $request -> title . '"';
        $activity -> save();
        return redirect('/home');
    }

    public function deletePostingan(Request $request, $id){
        $target = Postingan::find($id);
        $bid_data = BidData::where('postingan_id', $id);
        $activity = new Activity;

        // Untuk activity table
        $activity -> user_id = Auth::user()->id;
        $activity -> keterangan = 'Delete post ' . '"' . $request -> title . '"';
        $activity -> save();

        $bid_data->delete();
        $target->delete();
        return redirect('/home');
    }

    public function accountListPages(){
        $getAdminAccount = User::where('role', 'admin')->get();
        $getOfficerAccount = User::where('role', 'officer')->get();
        $account = User::all();
        return view('pages/account', compact(['getAdminAccount', 'getOfficerAccount', 'account']));
    }

    public function addAccount(Request $request){
        $new_account = new User;
        $activity = new Activity;

        $new_account -> name = $request -> name;
        $new_account -> email = $request -> email;
        $new_account -> role = $request -> role;
        $new_account -> password = Hash::make($request -> password);

        // Untuk activity table
        $activity -> user_id = Auth::user()->id;
        $activity -> keterangan = 'Add account ' . '"' . $request -> name . '"';
        $activity -> save();

        $new_account -> save();
        return redirect('/account-pages');
    }

    public function searchAccount(Request $request){
        $user = User::where('name', 'LIKE', '%' . $request -> result . '%');
    }

    public function getAccountDetailEdit($id){
        $user = User::find($id);

        return view('pages/ajax/accountDetails', compact('user'));
    }

    public function deleteAccount($id){
        $user = User::find($id);
        $user -> delete();

        return back()->with('success', 'Account deleted successfully!');
    }

    public function listItem(Request $request){
        if($request->has('status')){
            $get_all = Postingan::where('category', 'LIKE', '%' . $request->result . '%');

            if($request->status == true){
                return json_encode($get_all->get());
            }
        }else{
            $listItem = Postingan::latest()->get();
        }
        
        return view('pages/list-item', compact(['listItem']));
    }

    public function sendMessage(Request $request, $id){
        $search = new Massage;
        $activity = new Activity;
        
        $user = $request -> winner_name;
        $message = $request -> winner_message;
        $target_id = User::where('name', $user)->pluck("id")->first();
        

        $search -> admin_id = Auth::user()->id;
        $search -> user_id = $target_id;
        $search -> massage = $message;
        $search -> postingan_id = $id;

        $search -> save();
        $set_postingan_winner = Postingan::find($id);
        $set_postingan_winner -> winner = $user;
        $set_postingan_winner -> status = 'Closed';
        $set_postingan_winner -> save();

        // Untuk activity table
        $activity -> user_id = Auth::user()->id;
        $activity -> keterangan = 'Have set winner ' . '"' . $user . '"';
        $activity -> save();
        return redirect('/home');
    }

    public function inbox(){
        if(Auth::user()->role == 'user'){
            $user_id = Auth::user()->id;
            $get_message = Massage::where('user_id', $user_id)->latest()->get();
            $is_replied = UserReply::all();
            return view('pages/inbox', compact(['get_message', 'is_replied']));
        }else if(Auth::user()->role == 'admin'){
            $get_message = UserReply::all();
            return view('pages/inbox', compact('get_message'));
        }
    }

    public function inboxReply(Request $request){
        $user_reply = new UserReply;

        $user_reply -> user_id = Auth::user()->id;
        $user_reply -> postingan_id = $request -> id;
        $user_reply -> inbox_id = $request -> inbox_id;
        $user_reply -> receipent_name = $request -> receipent_name;
        $user_reply -> address = $request -> address;
        $user_reply -> phone_number = $request -> phone_number;
        $user_reply -> postal_code = $request -> postal_code;
        $user_reply -> desc = $request -> desc;

        $user_reply -> save();
        return redirect('/inbox');
    }

    public function getInboxDetails($id){
        $messages = Massage::find($id);
        $user_reply = UserReply::find($id);
        return view('pages/ajax/inboxDetails', compact(['messages', 'user_reply']));
    }
 
    public function search(Request $request){

        if($request->has('search')){
            $get_all = Postingan::where('title', 'LIKE', '%' . $request->result . '%');

            if($request->search == true){
                return json_encode($get_all->get());
            }
        }else if($request->has('status')){
            $get_all = Postingan::where('category', 'LIKE', '%' . $request->result . '%');

            if($request->status == true){
                return json_encode($get_all->get());
            } 
        }else{
            $latest_postingan = Postingan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->limit(6)->get();
            $get_all = Postingan::inRandomOrder()->get();
        }


        // $latest_postingan = Postingan::latest()->limit(4)->get();
        return view('pages/search', compact(['latest_postingan', 'get_all']));
    }

    public function history(Request $request){
        // if($request->has('status')){
        //     $data = BidData::where('category', 'LIKE', '%' . $request->result . '%')->where('user_id', Auth::user()->id);

        //     if($request->status == true){
        //         return json_encode($data->get());
        //     }
        // }else{
        //     $data = BidData::where('user_id', Auth::user()->id)->latest() -> get();
        // }
        $data = BidData::where('user_id', Auth::user()->id)->distinct()->latest()->get(['postingan_id']);
        return view('pages/history', compact('data'));
    }

    public function setAuctionStatus(Request $request, $id){
        $postingan = Postingan::find($id);
        $postingan -> status = $request -> status;
        $postingan->save();
    }



    public function test() {
        // $lel = Postingan::with('bidData')->get();
        // $lel = Postingan::where('id', '2')->with('bidData')->get();
        // $data_bid = DB::table('bid_data')->where('postingan_id', 1)->get();
        // $data_bid = BidData::where('postingan_id', 1)->orderBy('bid', 'asc')->get();

        $lol = Auth::user()->role;
        dd($lol);
    }



    // Helper Function
    public function moneyFormat($amount){
        return number_format($amount, 2);
    }

    public function dateConvert($bulan){
        $namaBulan = [
            1 => 'January',
            2 => 'February',
            3 => 'March',                                       
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        $result = Carbon::createFromFormat('m/d/Y', $bulan);
        foreach($namaBulan as $bulan => $key){
            if($bulan == $result->month){
                return $key . ' ' . $result->day . ',' . ' ' . $result->year;
            }
        }
    }
}