<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Image;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\MultiImage;

class PortfolioController extends Controller
{
    //
    public function AllPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    } //end method

    public function AddPortfolio()
    {
        return view('admin.portfolio.portfolio_add');
    } //end method

    public function StorePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
            'portfolio_description' => 'required',
            'portfolio_date' => 'required',
            'portfolio_location' => 'required',
            'portfolio_client' => 'required',
            'portfolio_category' => 'required',
            'portfolio_link' => 'required',
        ], [
            'portfolio_name.required' => 'Portfolio name is required',
            'portfolio_title.required' => 'Portfolio title is required',
            'portfolio_image.required' => 'Portfolio image is required',
            'portfolio_description.required' => 'Portfolio description is required',
            'portfolio_date.required' => 'Portfolio date is required',
            'portfolio_location.required' => 'Portfolio location is required',
            'portfolio_client.required' => 'Portfolio client is required',
            'portfolio_category.required' => 'Portfolio category is required',
            'portfolio_link.required' => 'Portfolio link is required',
        ]);
        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //generate random name
        Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
        $save_url = 'upload/portfolio/' . $name_gen;
        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'portfolio_date' => $request->portfolio_date,
            'portfolio_location' => $request->portfolio_location,
            'portfolio_client' => $request->portfolio_client,
            'portfolio_category' => $request->portfolio_category,
            'portfolio_link' => $request->portfolio_link,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Portfolio Data Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.portfolio')->with($notification);
    } // end  method

    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));
    } //end method

    public function UpdatePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_date' => 'required',
            'portfolio_location' => 'required',
            'portfolio_client' => 'required',
            'portfolio_category' => 'required',
            'portfolio_link' => 'required',
        ], [
            'portfolio_name.required' => 'Portfolio name is required',
            'portfolio_title.required' => 'Portfolio title is required',
            'portfolio_description.required' => 'Portfolio description is required',
            'portfolio_date.required' => 'Portfolio date is required',
            'portfolio_location.required' => 'Portfolio location is required',
            'portfolio_client.required' => 'Portfolio client is required',
            'portfolio_category.required' => 'Portfolio category is required',
            'portfolio_link.required' => 'Portfolio link is required',
        ]);

        $portfolio = Portfolio::findOrFail($request->id); // Retrieve the existing portfolio data

        if ($request->file('portfolio_image')) {
            // Check if a new image is being uploaded
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
            $save_url = 'upload/portfolio/' . $name_gen;

            // Delete the existing image on localhost
            if (file_exists($portfolio->portfolio_image)) {
                unlink($portfolio->portfolio_image);
            }

            // Update the portfolio data with the new image
            $portfolio->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
                'portfolio_date' => $request->portfolio_date,
                'portfolio_location' => $request->portfolio_location,
                'portfolio_client' => $request->portfolio_client,
                'portfolio_category' => $request->portfolio_category,
                'portfolio_link' => $request->portfolio_link,
            ]);

            $notification = [
                'message' => 'Portfolio Data Updated with Image Successfully',
                'alert-type' => 'success',
            ];
        } else {
            // No new image uploaded, update the portfolio data without changing the image
            $portfolio->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_date' => $request->portfolio_date,
                'portfolio_location' => $request->portfolio_location,
                'portfolio_client' => $request->portfolio_client,
                'portfolio_category' => $request->portfolio_category,
                'portfolio_link' => $request->portfolio_link,
            ]);

            $notification = [
                'message' => 'Portfolio Data Updated without Image Successfully',
                'alert-type' => 'success',
            ];
        }

        return redirect()->route('all.portfolio')->with($notification);
    } //end method


    public function DeletePortfolio($id)
    {
        //delete image on localhost
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img); //delete from local storage
        //delete data by id in DB
        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Portfolio Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method

    public function PortfolioDetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $icons = MultiImage::all();
        return view('frontend.portfolio_details', compact('portfolio', 'icons'));
    } //end method

    public function HomePortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        $icons = MultiImage::all();
        return view('frontend.portfolio', compact('portfolio', 'icons'));
    }
}
