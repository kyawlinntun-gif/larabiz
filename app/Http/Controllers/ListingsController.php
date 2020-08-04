<?php

namespace App\Http\Controllers;

use App\Listing;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ListingsController extends Controller
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function test(Request $request)
    {
        // $user = User::find(1);
        // $listing = new Listing;
        // $listing->name = "Kyaw Linn Tun";
        // $listing->address = "Bahan";
        // $listing->website = "kyaw";
        // $listing->email = "kyawlinntun@gmail.com";
        // $listing->phone = "123456";
        // $listing->bio = "Hello";

        // $user->listings()->save($listing);

        // return User::find(Auth::id());
        // return Auth::user();


    }
    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $listings = Listing::latest()->get();
        return view('listings.index', [
            'listings' => $listings
        ]);
    }
    
    /**
     * show
     *
     * @param  mixed $listing
     * @return void
     */
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
     
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view("listings.create");
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:listings',
            'address' => 'required',
            'website' => 'required|unique:listings',
            'email' => 'required|unique:listings',
            'phone' => 'required',
        ]);
        
        $listing = new Listing;
        $listing->name = $request->name;
        $listing->address = $request->address;
        $listing->website = $request->website;
        $listing->email = $request->email;
        $listing->phone = $request->phone;
        $listing->bio = $request->bio;

        Auth::user()->listings()->save($listing);

        return redirect('/dashboard')->with('success', 'Listing was added successfully!');
    }
    
    /**
     * edit
     *
     * @param  mixed $listing
     * @return void
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }
    
    /**
     * update
     *
     * @param  mixed $listing
     * @param  mixed $request
     * @return void
     */
    public function update(Listing $listing, Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required|unique:listings,name,'.$listing->id,
            'address' => 'required',
            'website' => 'required|unique:listings,website,'.$listing->id,
            'email' => 'required|unique:listings,email,'.$listing->id,
            'phone' => 'required',
        ]);

        $listing->name = $request->name;
        $listing->address = $request->address;
        $listing->website = $request->website;
        $listing->email = $request->email;
        $listing->phone = $request->phone;
        $listing->bio = $request->bio;

        Auth::user()->listings()->save($listing);

        return redirect('/dashboard')->with('success', 'Listing was edited!');
    }
    
    /**
     * destroy
     *
     * @param  mixed $listing
     * @return void
     */
    public function destroy(Listing $listing)
    {
        $name = $listing->name;
        $listing->delete();

        return redirect('/dashboard')->with('success', $name . ' was deleted!');
    }
}
