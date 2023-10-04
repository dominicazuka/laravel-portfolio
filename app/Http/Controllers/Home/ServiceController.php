<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Image;
use Illuminate\Support\Carbon;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\MultiImage;

class ServiceController extends Controller
{
    public function AllService()
    {
        $services = Services::latest()->get();
        return view('admin.service.all_service', compact('services'));
    } //end method

    public function AddService()
    {
        return view('admin.service.add_service');
    } //end method

    public function StoreService(Request $request)
    {
        $request->validate([
            'service_image' => 'required',
            'service_icon' => 'required',
            'service_title' => 'required',
            'service_description' => 'required',
        ], [
            'service_image.required' => 'Service Image is required',
            'service_icon.required' => 'Service icon is required',
            'service_title.required' => 'Service title is required',
            'service_description.required' => 'Service description is required',
        ]);
        $image = $request->file('service_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //generate random name
        Image::make($image)->resize(1020, 519)->save('upload/services/images/' . $name_gen);
        $save_url_image = 'upload/services/images/' . $name_gen;

        $icon = $request->file('service_icon');
        $name_gen = hexdec(uniqid()) . '.' . $icon->getClientOriginalExtension(); //generate random name
        Image::make($icon)->resize(86, 90)->save('upload/services/icons/' . $name_gen);
        $save_url_icon = 'upload/services/icons/' . $name_gen;

        Services::insert([
            'service_image' => $save_url_image,
            'service_icon' => $save_url_icon,
            'service_title' => $request->service_title,
            'service_description' => $request->service_description,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Service Data Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.service')->with($notification);
    } //end method

    public function EditService($id)
    {
        $service = Services::findOrFail($id);
        return view('admin.service.edit_service', compact('service'));
    } //end method

    public function UpdateService(Request $request)
    {
        $request->validate([
            'service_title' => 'required',
            'service_description' => 'required',
        ], [
            'service_title.required' => 'Service title is required',
            'service_description.required' => 'Service description is required',
        ]);

        $service = Services::findOrFail($request->id); // Retrieve the existing service data

        if ($request->file('service_icon') && $request->file('service_image')) {
            // Check if a new icon is being uploaded
            $icon = $request->file('service_icon');
            $name_gen = hexdec(uniqid()) . '.' . $icon->getClientOriginalExtension();
            Image::make($icon)->resize(86, 90)->save('upload/services/icons/' . $name_gen);
            $save_url_icon = 'upload/services/icons/' . $name_gen;
            // Delete the existing icon on localhost
            if (file_exists($service->service_icon)) {
                unlink($service->service_icon);
            }

            // Check if a new image is being uploaded
            $image = $request->file('service_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('upload/services/images/' . $name_gen);
            $save_url_image = 'upload/services/images/' . $name_gen;

            // Delete the existing image on localhost
            if (file_exists($service->service_image)) {
                unlink($service->service_image);
            }

            // Update the service data
            $service->update([
                'service_icon' => $save_url_icon,
                'service_image' => $save_url_image,
                'service_title' => $request->service_title,
                'service_description' => $request->service_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Service Data Updated with Image and Icon Successfully',
                'alert-type' => 'success',
            ];
        } else if ($request->file('service_image')) {
            // Check if a new image is being uploaded
            $image = $request->file('service_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('upload/services/images/' . $name_gen);
            $save_url_image = 'upload/services/images/' . $name_gen;

            // Delete the existing image on localhost
            if (file_exists($service->service_image)) {
                unlink($service->service_image);
            }

            // Update the service data
            $service->update([
                'service_image' => $save_url_image,
                'service_title' => $request->service_title,
                'service_description' => $request->service_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Service Data Updated with Image Successfully',
                'alert-type' => 'success',
            ];
        } else if ($request->file('service_icon')) {
            // Check if a new icon is being uploaded
            $icon = $request->file('service_icon');
            $name_gen = hexdec(uniqid()) . '.' . $icon->getClientOriginalExtension();
            Image::make($icon)->resize(86, 90)->save('upload/services/icons/' . $name_gen);
            $save_url_icon = 'upload/services/icons/' . $name_gen;
            // Delete the existing icon on localhost
            if (file_exists($service->service_icon)) {
                unlink($service->service_icon);
            }

            // Update the service data
            $service->update([
                'service_icon' => $save_url_icon,
                'service_title' => $request->service_title,
                'service_description' => $request->service_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Service Data Updated with Icon Successfully',
                'alert-type' => 'success',
            ];
        } else {
            // No new image and icon uploaded, update the service data without changing the image
            $service->update([
                'service_title' => $request->service_title,
                'service_description' => $request->service_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Service Data Updated without Image and Icon Successfully',
                'alert-type' => 'success',
            ];
        }

        return redirect()->route('all.service')->with($notification);
    } //end method

    public function DeleteService($id)
    {
        $service = Services::findOrFail($id); //get service by id

        //delete image on localhost
        $img = $service->service_image;
        unlink($img); //delete image from local storage

        //delete icon on localhost
        $icon = $service->service_icon;
        unlink($icon); //delete icon from local storage

        //delete data by id in DB
        Services::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Service Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method

    public function ServiceDetails($id)
    {
        $service = Services::findOrFail($id);
        $allServices = Services::latest()->limit(5)->get();
        $allBlogs = Blog::latest()->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get(); //get data from blog Category model by name in ascending order
        $icons = MultiImage::all();
        return view('frontend.service_details', compact('service', 'allServices', 'allBlogs', 'categories', 'icons'));
    } //end method

    public function HomeServices()
    {
        $service = Services::latest()->get();
        $allServices = Services::latest()->paginate(3);
        $allBlogs = Blog::latest()->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get(); //get data from blog Category model by name in ascending order
        $icons = MultiImage::all();
        return view('frontend.service', compact('service', 'allServices', 'allBlogs', 'categories', 'icons'));
    }
}
