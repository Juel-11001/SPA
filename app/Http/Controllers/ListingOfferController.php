<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
    public function store(Request $request, Listing $listing)
    {
        $validator=$request->validate([
            'amount'=> 'required|integer|min:1'
        ]);
        $offer=new Offer($validator);
        $offer->user()->associate($request->user());
        $listing->offers()->save($offer);
        return redirect()->back()->with('success', 'Offers was Made!');
    }
}
