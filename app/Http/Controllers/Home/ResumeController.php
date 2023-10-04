<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ResumeController extends Controller
{
    public function downloadResume()
    {
        $filePath = public_path() . "/upload/resume/resume.pdf";

        // Check if the file exists
        if (file_exists($filePath)) {
            $headers = ['Content-Type: application/pdf'];
            $fileName = time() . '.pdf';
            // Serve the file for download
            $notification = array(
                'message' => 'Resume Download Initiated Successfully',
                'alert-type' => 'success'
            );
            Session::flash('notification', $notification);
            return response()->download($filePath, $fileName, $headers);
        } else {
            // If the file doesn't exist, you can handle the error appropriately
            $errorNotification = array(
                'message' => 'Resume not found',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($errorNotification);
        }
    } //end method
}
