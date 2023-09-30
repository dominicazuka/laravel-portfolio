<?php

namespace App\Http\Controllers\Home;
use Image;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function AllTestimonial(){
        $testimonial = Testimonial::latest()->get();
        return view('admin.testimonial.testimonial_all', compact('testimonial'));
    }//end method

    public function AddTestimonial(){
        return view('admin.testimonial.testimonial_add');
    }//end method

    public function StoreTestimonial(Request $request){
        $request->validate([
            'testimonial_name' => 'required',
            'testimonial_image' => 'required',
            'testimonial_description' => 'required',
        ], [
            'testimonial_name.required' => 'Testimonial name is required',
            'testimonial_image.required' => 'Testimonial image is required',
            'testimonial_description.required' => 'Testimonial description is required',
        ]);
        $image = $request->file('testimonial_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //generate random name
        Image::make($image)->resize(120, 120)->save('upload/testimonial/' . $name_gen);
        $save_url = 'upload/testimonial/' . $name_gen;
        Testimonial::insert([
            'testimonial_name' => $request->testimonial_name,
            'testimonial_image' => $save_url,
            'testimonial_description' => $request->testimonial_description,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Testimonial Data Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.testimonial')->with($notification);
    }//end method

    public function EditTestimonial($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.testimonial_edit', compact('testimonial'));
    }//end method

    public function UpdateTestimonial(Request $request){
        $request->validate([
            'testimonial_name' => 'required',
            'testimonial_description' => 'required',
        ], [
            'testimonial_name.required' => 'Testimonial name is required',
            'testimonial_description.required' => 'Testimonial description is required',
        ]);

        $testimonial = Testimonial::findOrFail($request->id); // Retrieve the existing portfolio data

        if ($request->file('testimonial_image')) {
            // Check if a new image is being uploaded
            $image = $request->file('testimonial_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(120, 120)->save('upload/testimonial/' . $name_gen);
            $save_url = 'upload/testimonial/' . $name_gen;

            // Delete the existing image on localhost
            if (file_exists($testimonial->testimonial_image)) {
                unlink($testimonial->testimonial_image);
            }

            // Update the portfolio data with the new image
            $testimonial->update([
                'testimonial_name' => $request->testimonial_name,
                'testimonial_description' => $request->testimonial_description,
                'testimonial_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Testimonial Data Updated with Image Successfully',
                'alert-type' => 'success',
            ];
        } else {
            // No new image uploaded, update the portfolio data without changing the image
            $testimonial->update([
                'testimonial_name' => $request->testimonial_name,
                'testimonial_description' => $request->testimonial_description,
            ]);

            $notification = [
                'message' => 'Testimonial Data Updated without Image Successfully',
                'alert-type' => 'success',
            ];
        }

        return redirect()->route('all.testimonial')->with($notification);
    }//end method

    public function DeleteTestimonial($id){
         //delete image on localhost
         $testimonial = Testimonial::findOrFail($id);
         $img = $testimonial->testimonial_image;
         unlink($img); //delete from local storage
         //delete data by id in DB
         Testimonial::findOrFail($id)->delete();
         $notification = array(
             'message' => 'Testimonial Data Deleted Successfully',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
    }//end method
}
