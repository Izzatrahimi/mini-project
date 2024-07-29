@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <!-- Big background header -->
        <header class="text-bg-light py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="text-center">
                            <h2 class="fw-bold">Find Your Parcel Here</h2>
                            <h4 class="fw-bold">Automatically detect parcel based on the tracking number format</h4>
                            <h6 class="">SPXMY043978601057</h6>
                        </div>
                        <form>
                            <div class="col-md-6 mx-auto form-floating mb-3">
                                <div class="input-group mt-3">
                                    <input type="text" class="form-control text-center" id="TrackNo" maxlength="50"
                                        placeholder="Enter Tracking Number">
                                    <button type="button" class="btn btn-primary" onclick="inputTrack()">
                                        <i class="fas fa-search fa-xs me-2"></i> Track
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Parcel Table Section -->
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold mb-0">List of Your Parcels</h2>
                    <div class="col-md-4"> <!-- Adjust the width here -->
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" name="search"
                                placeholder="Search by Sales Order ID" oninput="search()">
                            <button type="submit" class="btn btn-outline-primary" id="button-addon2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Your Parcel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                            @foreach ($deliveryOrders as $detail)
                                <tr style="height: 120px;">
                                    <td style="vertical-align: middle;">
                                        <div class="row align-items-center">
                                            <div class="col-md-3 mb-3 mb-md-0 text-center">
                                                @foreach ($detail->deliveryOrderDetails as $details)
                                                    <img src="{{ asset('img/' . $details->product->product_cover ?? null) }}"
                                                        alt="{{ $details->product->name }}" class="img-thumbnail"
                                                        style="width: 200px; padding: 0px;">
                                                @endforeach
                                            </div>
                                            <div class="col-md-9">
                                                <div class="fw-bold mb-1">Your Order is On the Way!</div>
                                                <div class="text-secondary mb-1">Your order
                                                    <span
                                                        class="fw-bold sales-order-id">{{ $detail->sales_order_no }}</span>
                                                    will be delivered by
                                                    <span class="fw-bold">{{ $detail->courier->name }}</span>
                                                    today.
                                                </div>
                                                <div class="small text-secondary mb-1" class="text-secondary">
                                                    {{ $detail->delivery_order_date }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <!-- View button with data attribute to store tracking number -->
                                        <button class="btn btn-outline-primary view-btn"
                                            data-tracking-no="{{ $detail->tracking_no }}">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script src="//www.tracking.my/track-button.js"></script>
    <script>
        // Add event listener to all view buttons
        document.querySelectorAll('.view-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Retrieve tracking number from data attribute
                var trackingNo = this.getAttribute('data-tracking-no');
                // Display tracking result using the tracking button script
                TrackButton.track({
                    tracking_no: trackingNo
                });
            });
        });

        function inputTrack() {
            var num = document.getElementById("TrackNo").value;
            if (num === "") {
                alert("Please enter a tracking number");
                return;
            }
            TrackButton.track({
                tracking_no: num
            });
        }

        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("productTableBody");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].querySelector(".sales-order-id"); // Update to target the element with class "sales-order-id"
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
