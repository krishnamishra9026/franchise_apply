<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Earning;
use App\Models\Buyer;
use App\Models\Seller;

class EarningsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
         $this->middleware(['permission:earnings']);
    }

    public function earnings(Request $request)
    {        
        $sellers = Seller::orderBy('id', 'desc')->get(['firstname', 'lastname', 'id']);
        $buyers = Buyer::orderBy('id', 'desc')->get(['firstname', 'lastname', 'id']);

        $filter_date              = $request->input('filter_date');
        $filter_seller             = $request->input('filter_seller');
        $filter_buyer             = $request->input('filter_buyer');

        $earnings = Earning::orderBy('id', 'desc');
        $total_earnings = Earning::sum('commission_earned');

        if ($request->filter_date) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date')));
            $earnings->whereDate('created_at', $from);
        }

        if ($request->filter_seller) {
            $earnings->where('seller_id', $request->input('filter_seller'));
        }  

        if ($request->filter_buyer) {
            $earnings->where('buyer_id', $request->input('filter_buyer'));
        }       

        $earnings = $earnings->paginate(15);    

        return view('admin.earnings.earnings', compact('earnings', 'buyers', 'sellers', 'total_earnings'));
    
    }
}
