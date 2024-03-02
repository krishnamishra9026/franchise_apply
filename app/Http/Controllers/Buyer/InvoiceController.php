<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Buyer;
use App\Models\Seller;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function index(Request $request)
    {
        $sellers = Seller::orderBy('id', 'desc')->get(['firstname', 'lastname', 'id']);
        $buyers = Buyer::orderBy('id', 'desc')->get(['firstname', 'lastname', 'id']);

        $filter_status            = $request->input('filter_status');
        $filter_date              = $request->input('filter_date');
        $filter_seller             = $request->input('filter_seller');
        $filter_buyer             = $request->input('filter_buyer');

        $invoices = Invoice::where('buyer_id', auth()->guard('buyer')->user()->id)->orderBy('id', 'desc');

        if ($request->filter_date) {
            $from   = date("Y-m-d", strtotime($request->input('filter_date')));
            $invoices->whereDate('created_at', $from);
        }  

        if (isset($request->filter_status)) {
            $invoices->where('status', '=', $request->input('filter_status'));
        }

        if ($request->filter_seller) {
            $invoices->where('seller_id', $request->input('filter_seller'));
        }  

        if ($request->filter_buyer) {
            $invoices->where('buyer_id', $request->input('filter_buyer'));
        }       

        $invoices = $invoices->paginate(15);    

        return view('buyer.invoices.invoices', compact('invoices', 'buyers', 'sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::with('car', 'seller', 'buyer')->find($id);

        return view('buyer.invoices.view-invoice', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function downloadInvoice($id)
    {
        ini_set('max_execution_time', 3600); 
        set_time_limit(3600);

        $invoice = Invoice::find($id);
        
        $invoice_date = date('jS F Y', strtotime($invoice->created_at)); 
        
        $pdf = PDF::loadView('buyer.invoices.invoice_template', compact('invoice'));

        return $pdf->download('Invoice_'.$invoice_date.'.pdf');
    }
}
