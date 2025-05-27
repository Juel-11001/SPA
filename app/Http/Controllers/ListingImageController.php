<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load(['images']);
        return inertia('user-profile/listing-image/create',[
           'listing'=>$listing
        ]);
    }

    public function store(Request $request, Listing $listing)
    {
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*'=>'image|mimes:jpg,jpeg,png,webp|max:5048',
            ],[
                'images.*'=> 'The image should be on of them jpg, jpeg, png and webp'
            ]);
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');
                // dd($listing->images()->create([
                //     'image' => $path,
                // ]));
                $listing->images()->create([
                    'image' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }

    public function destroy(Listing $listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->image);
        $image->delete();
        return redirect()->back()->with('success', "Image was Deleted Successfully!");
    }



}
