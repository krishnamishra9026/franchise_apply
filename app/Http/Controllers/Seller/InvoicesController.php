<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function Invoices()
    {
        return view('seller.invoices.invoices');
    }
    public function ViewInvoice()
    {
        return view('seller.invoices.view-invoice');
    }
}
