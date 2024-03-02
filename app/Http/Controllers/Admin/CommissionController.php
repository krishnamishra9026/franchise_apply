<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommissionSetting;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:settings']);
    }

    public function commission()
    {
        $commission_setting_exists = CommissionSetting::where('id', 1)->exists();

        if (!$commission_setting_exists) {
            CommissionSetting::create(['id' => 1, 'amount' => 5]);
            $commission_setting = CommissionSetting::where('id', 1)->first();   
        }else{
            $commission_setting = CommissionSetting::where('id', 1)->first();       
        }

        return view('admin.settings.commission', compact('commission_setting'));
    }

    public function updateCommission(Request $request)
    {
        $commission_setting_exists = CommissionSetting::where('id', 1)->exists();

        if (!$commission_setting_exists) {
            CommissionSetting::create(['id' => 1, 'amount' =>$request->amount]);
        }else{
            CommissionSetting::where('id', 1)->update(['amount' => $request->amount]);            
        }
        return redirect()->route('admin.commission')->with('success', 'Commission updated successfully!');      
    }
}
