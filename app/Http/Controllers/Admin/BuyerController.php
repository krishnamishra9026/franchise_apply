<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\Hash;
use DB;

class BuyerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:buyers']);
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

        $buyers = Buyer::orderBy('id', 'desc');

        if ($request->filter_name) {
            $buyers->where('firstname', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere('lastname', 'LIKE', '%' . $request->input('filter_name') . '%')->orWhere(DB::raw('concat(firstname," ",lastname)') , 'LIKE', '%' . $request->input('filter_name') . '%');
        }

        if (isset($request->filter_status)) {
            $buyers->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_phone) {
            $buyers->where('phone', 'LIKE', '%' . $request->input('filter_phone') . '%');
        }

        if ($request->filter_email) {
            $buyers->where('email', 'LIKE', '%' . $request->input('filter_email') . '%');
        }              

        $buyers = $buyers->paginate(15);    

        return view('admin.buyer.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buyer.create');
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

        $buyer = Buyer::create($input);

        return redirect()->route('admin.buyers.index')->with('success', 'Buyer added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buyer   = Buyer::with('orders')->find($id);

        return view('admin.buyer.show', compact('buyer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buyer   = Buyer::find($id);

        return view('admin.buyer.edit', compact('buyer'));
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

        $buyer = Buyer::find($id);

        
        if (isset($input['password']) && !empty($input['password'])) {
            $input['password'] = Hash::make(($input['password']));
        }else{
            $input['password'] = 'password';
        }
        
        Buyer::find($id)->update($input);

        return redirect()->route('admin.buyers.index')->with('success', 'Buyer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        Buyer::find($id)->delete();
        return redirect()->route('admin.buyers.index')->with('success', 'Buyer deleted successfully');
    }
}
