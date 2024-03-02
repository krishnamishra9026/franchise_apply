<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class SupportController extends Controller
{
    public function support()
    {
        return view('customer-support');
    }

    public function saveSupport(Request $request)
    {
        $request->validate([
            'name'                  => ['required'],
            'email'                 => ['required'],
            'query'               => ['required'],
        ]);

        $input = $request->except('_token');

        $product = Enquiry::create($input);

        return redirect()->back()->with('message', 'Enquiry submitted successfully!');
    }
}