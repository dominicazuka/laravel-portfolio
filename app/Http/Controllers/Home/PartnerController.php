<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Partner;
use App\Models\PartnerMultiImage;
use Illuminate\Support\Carbon;

class PartnerController extends Controller
{
    public function PartnerPage()
    {
        $partner = Partner::find(1);
        return view('admin.partner_page.partner_page_all', compact('partner'));
    } //end method

    public function UpdatePartner(Request $request)
    {
        $request->validate([
            'partner_title' => 'required',
            'partner_description' => 'required',
        ], [
            'partner_title.required' => 'Partner title is required',
            'partner_description.required' => 'Partner description is required',
        ]);
        $partner_id = $request->id;
        Partner::findOrFail($partner_id)->update([
            'partner_title' => $request->partner_title,
            'partner_description' => $request->partner_description,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Partner Data Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method

    public function PartnerMultiImage()
    {
        return view('admin.partner_page.multi_image');
    } //end method

    public function StorePartnerMultiImage(Request $request)

    {
        $request->validate([
            'multi_image' => 'required',
        ], [
            'multi_image.required' => 'Partner image is required',
        ]);
        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {

            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();  // random generated name

            Image::make($multi_image)->resize(124, 124)->save('upload/partner/' . $name_gen);
            $save_url = 'upload/partner/' . $name_gen;

            PartnerMultiImage::insert([

                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        } // End of foreach


        $notification = array(
            'message' => 'Multi Image Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.partner.multi.image')->with($notification);
    } //end method

    public function AllPartnerMultiImage()
    {
        $allPartnerMultiImage = PartnerMultiImage::all();
        return view('admin.partner_page.all_partner_multi_image', compact('allPartnerMultiImage'));
    } //end method

    public function EditPartnerMultiImage($id)
    {
        $partnerMultiImage = PartnerMultiImage::findOrFail($id);
        return view('admin.partner_page.edit_partner_multi_image', compact('partnerMultiImage'));
    } //end method

    public function UpdatePartnerMultiImage(Request $request)
    {
        $request->validate([
            'multi_image' => 'required',
        ], [
            'multi_image.required' => 'Partner image is required',
        ]);
        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // random generated name
            Image::make($image)->resize(124, 124)->save('upload/partner/' . $name_gen);
            $save_url = 'upload/partner/' . $name_gen;

            // Retrieve the existing multi-image data
            $multiImage = PartnerMultiImage::findOrFail($multi_image_id);

            // Delete the existing image on localhost
            if (file_exists($multiImage->multi_image)) {
                unlink($multiImage->multi_image);
            }

            // Update the multi-image data with the new image
            $multiImage->update([
                'multi_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Image Data Updated Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.partner.multi.image')->with($notification);
        }
    } //end method

    public function DeletePartnerMultiImage($id)
    {
        //delete image on localhost
        $multi = PartnerMultiImage::findOrFail($id);
        $img = $multi->multi_image;
        unlink($img);
        //delete data by id in DB
        PartnerMultiImage::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Image Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method
}
