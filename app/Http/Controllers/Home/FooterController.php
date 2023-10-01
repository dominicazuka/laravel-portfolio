<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;


class FooterController extends Controller
{
    public function FooterSetup(){
        $allFooter = Footer::find(1);
        return view('admin.footer.footer_all', compact('allFooter'));
    }//end method

    public function UpdateFooter(Request $request){
        $request->validate([
            'number' => 'required',
            'short_description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
            'github' => 'required',
            'copyright' => 'required',
        ], [
            'number.required' => 'Number is required',
            'short_description.required' => 'Short description is required',
            'address.required' => 'Address is required',
            'email.required' => 'Email is required',
            'facebook.required' => 'Facebook is required',
            'twitter.required' => 'Twitter is required',
            'linkedin.required' => 'LinkedIn is required',
            'youtube.required' => 'Youtube is required',
            'instagram.required' => 'Instagram is required',
            'github.required' => 'Github is required',
            'copyright.required' => 'Copyright is required',
        ]);
        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'github' => $request->github,
            'copyright' => $request->copyright,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method
}
