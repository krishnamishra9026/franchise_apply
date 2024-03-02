<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:invoices']);
    }

    public function invoices()
    {
        return view('admin.invoices.invoices');
    }
    public function viewInvoice()
    {
        return view('admin.invoices.view-invoice');
    }
}
