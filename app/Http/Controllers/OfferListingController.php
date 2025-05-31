<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class OfferListingController extends Controller
{
    use AuthorizesRequests;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Offer $offer)
    {
        $listing=$offer->listing;
        $this->authorize('update', $listing);
        //accept offer
        $offer->update([
            'accepted_at' => now()
        ]);
        $listing->sold_at=now();
        $listing->save();
        //reject other offers
        $listing->offers()->Except($offer)->update([
           'declined_at' => now()
        ]);

        return redirect()->back()->with('success', "Offer Accepted #{$offer->id} Successfully!");
    }
}
