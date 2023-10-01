<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use App\Models\MultiImage;
use App\Models\Footer;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function Contact(){
        $icons = MultiImage::all();
        $allFooter = Footer::find(1);
        return view('frontend.contact', compact('icons', 'allFooter'));
    }//end method

    public function StoreMessage(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'subject.required' => 'Subject is required',
            'phone.required' => 'Phone is required',
            'message.required' => 'Message is required',
        ]);

       // Check if validation fails
        if ($validator->fails()) {
            $errorNotification = [
                'message' => 'Error occurred, message not sent',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($errorNotification)->withErrors($validator);
        }

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Message Submitted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }//end method

    public function ContactMessage(){
        $contacts = Contact::latest()->get();
        return view('admin.contact.all_contact', compact('contacts'));
    }//end method

    public function DeleteMessage($id){
        Contact::findOrFail($id)->delete();
         $notification = array(
             'message' => 'Contact Deleted Successfully',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
    }//end method
}