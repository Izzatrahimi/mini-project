<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use Illuminate\Support\Facades\Auth;

class ParcelTrackingController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the authenticated users
        $user = Auth::user();

        // Start with querying all delivery orders associated with the authenticated user
        $deliveryOrdersQuery = DeliveryOrder::with(['deliveryOrderDetails', 'deliveryOrderDetails.product'])->where('user_id', $user->id);

        // Check if there's a search query
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            // Filter delivery orders by sales_order_id
            $deliveryOrdersQuery->where('sales_order_no', 'like', '%' . $searchTerm . '%');
        }

        // Execute the query
        $deliveryOrders = $deliveryOrdersQuery->get();

        // Pass the delivery orders data to the index view
        return view('index', compact('deliveryOrders'));
    }
}

