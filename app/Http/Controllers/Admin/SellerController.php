<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use DB;

class SellerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:sellers']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter_status            = $request->input('filter_status');
        $filter_name              = $request->input('filter_name');
        $filter_email             = $request->input('filter_email');
        $filter_phone             = $request->input('filter_phone');

        $sellers = Seller::orderBy('id', 'desc');

        if ($request->filter_name) {
            $sellers->where('firstname', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere('lastname', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere(DB::raw('concat(firstname," ",lastname)') , 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if (isset($request->filter_status)) {
            $sellers->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_phone) {
            $sellers->where('phone', 'LIKE', '%' . $request->input('filter_phone') . '%');
        }

        if ($request->filter_email) {
            $sellers->where('email', 'LIKE', '%' . $request->input('filter_email') . '%');
        }

        $sellers = $sellers->paginate(15);    

        return view('admin.seller.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'             => ['required'],
            'email'                 => ['required'],
            'phone'                 => ['required'],
        ]);

        $input = $request->except('_token');

        $input['password'] = Hash::make(($input['password'] ?? 'password'));

        $seller = Seller::create($input);

        return redirect()->route('admin.sellers.index')->with('success', 'Seller added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seller   = Seller::with('orders')->find($id);

        return view('admin.seller.show', compact('seller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seller   = Seller::find($id);              

        return view('admin.seller.edit', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname'                  => ['required'],
            'email'                      => ['required'],
            'phone'                      => ['required'],
        ]);

        $input = $request->except('_token');

        $seller = Seller::find($id);

        
        if (isset($input['password']) && !empty($input['password'])) {
            $input['password'] = Hash::make(($input['password']));
        }else{
            $input['password'] = 'password';
        }
        
        Seller::find($id)->update($input);

        return redirect()->route('admin.sellers.index')->with('success', 'Seller updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        Seller::find($id)->delete();
        return redirect()->route('admin.sellers.index')->with('success', 'Seller deleted successfully');
    }
}
