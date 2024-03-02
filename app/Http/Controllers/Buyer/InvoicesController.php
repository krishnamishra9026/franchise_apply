<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    public function InvoicesController()
    {
        return view('buyer.invoices.invoices');
    }
    public function ViewInvoice()
    {
        return view('buyer.invoices.view-invoice');
    }
}
