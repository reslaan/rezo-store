<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::orderBy('id', 'desc')->get();
        $product = Product::select('id')->get();
        $categories = Category::select('id')->get();

        return view('admin.offers.index')->with([
            'offers' => $offers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $products = Product::select('id')->orderBy('id', 'desc')->get();
        $categories = Category::select('id')->get();
        return view('admin.offers.new')->with([
                'products' => $products,
                'categories' => $categories,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {


        $offer = new Offer();
         $this->saveOfferData($request, $offer);
        Session::flash('success', __('alerts.offer_created'));
        return redirect(route('admin.offers.edit',$offer));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $products = Product::select('id')->orderBy('id', 'desc')->get();
        $categories = Category::select('id')->get();
        return view('admin.offers.edit')->with([
                'offer' => $offer,
                'products' => $products,
                'categories' => $categories,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, Offer $offer)
    {

        $this->saveOfferData($request, $offer);
        Session::flash('success', __('alerts.offer_updated'));
        return redirect(route('admin.offers.edit',$offer));    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Offer $offer)
    {
        try {

            $offer->delete();
            Session::flash('success', __('alerts.deleted'));
            return redirect()->route('admin.offers.index');

        } catch (\Exception $ex) {
            return redirect()->back()->with([
                'error' => __('alerts.not_exist')
            ]);
        }
    }

    /**
     * @param Request $request
     * @param Offer $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveOfferData(Request $request, Offer $offer)
    {
        if (!$request->has('is_active')) {
            $request->merge(['is_active' => 0]);
        }
        $offer->code = $request->code;
        $offer->description = $request->description;
        $offer->type = $request->type;
        $offer->discount = $request->discount;
        $offer->start_date = $request->start_date;
        $offer->end_date = $request->end_date;
        $offer->is_active = $request->is_active;
        $offer->save();
        $offer->categories()->sync($request->categories);
        $offer->products()->sync($request->products);

    }
}
