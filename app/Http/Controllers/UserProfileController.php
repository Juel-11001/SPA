<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $filters= [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by','order'])
        ];
        return inertia('user-profile/index',[
            'filters' => $filters,
            'listings' => Auth::user()->listings()
                    // ->mostRecent()
                    ->filter($filters)
                    ->paginate(5)
                    ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('user-profile/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'beds' => 'required|integer|min:0|max:200',
            'bath' => 'required|integer|min:0|max:200',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_number' => 'required|integer|min:1|max:200000',
            'price' => 'required|integer|min:1|max:100000000'
        ]);
        $user = $request->user();
        // dd($user);
        Listing::create([
            'user_id' => $user->id,
            'beds' => $request->beds,
            'bath' => $request->bath,
            'area' => $request->area,
            'city' => $request->city,
            'code' => $request->code,
            'street' => $request->street,
            'street_number' => $request->street_number,
            'price' => $request->price,
        ]);
        return redirect()->route('listing-profile.index')->with('success', 'Listing was Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing_profile)
    {
        $this->authorize('view', $listing_profile);
        return inertia('user-profile/edit', [
            'listing' => $listing_profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing_profile)
    {
                $this->authorize('update', $listing_profile);
        $listing_profile->update($request->validate([
            'beds' => 'required|integer|min:0|max:200',
            'bath' => 'required|integer|min:0|max:200',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_number' => 'required|integer|min:1|max:200000',
            'price' => 'required|integer|min:1|max:100000000'
        ]));
        return redirect()->route('listing-profile.index')->with('success', "Listing Update Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing_profile)
    {
        $this->authorize('delete', $listing_profile);
        // $listing=Listing::findOrFail($listing->id);
        // $listing->find();
        // dd($listing);
        $listing_profile->deleteOrFail();
        return redirect()->back()->with('success', 'Listing Deleted Successfully!');
    }
    public function restore(Listing $listing_profile)  
    {
        // $this->authorize('restore', $listing_profile);
        $listing_profile->restore();
        return redirect()->back()->with('success', 'Listing Restored Successfully!');
    }
}
