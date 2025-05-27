<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingController extends Controller
{
    use AuthorizesRequests;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->authorizeResource(Listing::class, 'listing');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom',
            'priceTo',
            'beds',
            'baths',
            'areaFrom',
            'areaTo'
        ]);
        return inertia('listing/index', [
            'filters' => $filters,
            'listings' => Listing::mostRecent()
                ->filter($filters)
                ->paginate(10)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return inertia('listing/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'beds' => 'required|integer|min:0|max:200',
        //     'bath' => 'required|integer|min:0|max:200',
        //     'area' => 'required|integer|min:15|max:1500',
        //     'city' => 'required',
        //     'code' => 'required',
        //     'street' => 'required',
        //     'street_number' => 'required|integer|min:1|max:200000',
        //     'price' => 'required|integer|min:1|max:100000000'
        // ]);
        // // dd($request->all());
        // // $user_id=$request->user()->id;
        // // dd($user_id);
        // // dd($user);
        // $user = $request->user();
        // // dd($user);
        // Listing::create([
        //     'user_id' => $user->id,
        //     'beds' => $request->beds,
        //     'bath' => $request->bath,
        //     'area' => $request->area,
        //     'city' => $request->city,
        //     'code' => $request->code,
        //     'street' => $request->street,
        //     'street_number' => $request->street_number,
        //     'price' => $request->price,
        // ]);
        // return redirect()->route('listing.index')->with('success', 'Listing was Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $listing->load(['images']);
        return inertia('listing/show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        // $user=Auth::user()->name;
        // dd($user);
        // Auth::user()->cannot('update', $listing);
        // $this->authorize('view', $listing);
        // return inertia('listing/edit', [
        //     'listing' => $listing
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        // Auth::user()->cannot('update', $listing);
        // $this->authorize('update', $listing);
        // $listing->update($request->validate([
        //     'beds' => 'required|integer|min:0|max:200',
        //     'bath' => 'required|integer|min:0|max:200',
        //     'area' => 'required|integer|min:15|max:1500',
        //     'city' => 'required',
        //     'code' => 'required',
        //     'street' => 'required',
        //     'street_number' => 'required|integer|min:1|max:200000',
        //     'price' => 'required|integer|min:1|max:100000000'
        // ]));
        // return redirect()->route('listing.index')->with('success', "Listing Update Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        // Auth::user()->cannot('delete', $listing);
        // $listing->deleteOrFail();
        // return redirect()->back()->with('success', 'Listing Deleted Successfully!');
    }
}
