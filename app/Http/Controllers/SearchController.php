<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder; // Adjust this according to your model namespace
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Perform search query using Eloquent
        $deliveryOrders = DeliveryOrder::where('sales_order_no', 'like', '%' . $searchTerm . '%')->get();

        // Pass the search results to the view
        return view('index', compact('deliveryOrders'));
    }
}
