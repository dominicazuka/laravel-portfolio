<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{
    public function CommentMessage(){
        $comments = Comment::latest()->get();
        return view('admin.comment.all_comment', compact('comments'));
    }//end method

    public function StoreComment(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'website' => 'nullable|url',
            'message' => 'required|string',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name can be at most 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.max' => 'Email can be at most 255 characters',
            'phone.required' => 'Phone is required',
            'phone.numeric' => 'Phone must be a number',
            'website.url' => 'Invalid Website format',
            'message.required' => 'Message is required',
        ]);

       // Check if validation fails
        if ($validator->fails()) {
            $errorNotification = [
                'message' => 'Error occurred, Comment not sent. Check the form',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($errorNotification)->withErrors($validator);
        }

        // Retrieve reCAPTCHA secret key from .env
        $secretKey = env('RECAPTCHA_SECRET_KEY');

        // Verify reCAPTCHA
        $response = request('g-recaptcha-response');

        $verificationResponse = Http::post("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$response}");

        $data = $verificationResponse->json();

        // Log the data
        // \Log::info([
        //     'response' => $response,
        //     'data' => $data,
        //     'secretKey' => $secretKey,
        // ]);

        if (!$data['success']) {
            // CAPTCHA verification failed
            $errorNotification = [
                'message' => 'reCAPTCHA verification failed. Please try again.',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($errorNotification);
        }

        Comment::insert([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Comment Submitted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }//end method

    public function DeleteComment($id){
        Comment::findOrFail($id)->delete();
         $notification = array(
             'message' => 'Comment Deleted Successfully',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
    }//end method
}
