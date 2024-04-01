@extends('admin.layouts.master')
@section('style')
    <style>
        .table {
            bcakground-color: white;
        }

        input[type="text"] {
            border: none;
            /* Remove border */
            box-shadow: none;
        }

        textarea {

            /* Adjust width as needed */
            /* Adjust height as needed */

            /* Remove border */
            box-shadow: none !important;
            /* Remove shadow */

            /* Disable resizing */
            padding: 10px;
            /* Optional: Add padding for content */
            margin: 0;
            /* Optional: Remove margin */
        }

        .header-color {
            color: #5d9bff;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
    <div class="container-fluid">
        <h1 class="header-color">Supplier Purchase Checkout</h1>
        <br>
        <div class="pagetitle ">
            {{-- <h4> Total Supplier Purchases -{{ $supplierPurchases->count() }}</h4> --}}
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Supplier Purchases</li>
                    <li class="breadcrumb-item "><b>Supplier Purchase Create</b></li>
                </ol>
            </nav>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="header-color">Select Products to Order</h4>
                    <table class="table" style="background-color:white" id="myTable">
                        <thead>
                            <tr>
                                <th style="color: #5d9bff"></th>
                                <th style="color: #5d9bff">No</th>
                                <th style="color: #5d9bff">Product Name</th>
                                <th style="color: #5d9bff">Price</th>
                                <th style="color: #5d9bff">Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="productTable">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" value="{{ $product->id }}"
                                            onchange="updateSelectedProducts(this)">
                                    </td>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <input type="number" class="form-control" value="1" min="1"
                                            onchange="handleQuantityChange(this)">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="text-center">Supplier Order Summary</h4>
                            </div>
                            <hr>
                            <form id="purchaseForm" action="{{ route('supplier_purchase.create') }}" method="POST">
                                @csrf
                                {{-- <div class="form-group">
                                    <label for="invoice_id" class="form-label">Invoice ID</label>
                                    <input type="text" class="form-control" id="invoice_id" name="invoice_id"
                                        placeholder="Invoice ID">
                                </div>
                                @error('invoice_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br> --}}

                                <div class="form-group">
                                    <label for="supplier" class="form-label">Supplier Name</label>
                                    <select id="supplier" name="supplier" class="form-control"
                                        class="form-select @error('supplier') is-invalid @enderror supplier"
                                        aria-label="Default select example">
                                        <option value="">Choose Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                @if (old('supplier') == $supplier->id) selected @endif>{{ $supplier->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('supplier')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>

                                <div class="form-group">
                                    <label for="payment" class="form-label">Payment Method</label>
                                    <select id="payment" name="payment" class="form-control">
                                        <option value="">Choose Payment Method</option>
                                        <option value="Credit Card" @if(old('payment') == 'Credit Card') selected @endif>Credit Card</option>
                                        <option value="Mobile Banking" @if(old('payment') == 'Mobile Banking') selected @endif>Mobile Banking</option>
                                    </select>
                                    @error('payment')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <br>
                                <hr>
                                <div class="form-group">
                                    <label for="selectedProducts" class="form-label">Selected Products</label>
                                    <textarea id="selectedProducts" name="selectedProducts" rows="4" class="form-control"
                                        placeholder="Choose Products from the Products table" readonly></textarea>
                                </div>
                                @error('selectedProducts')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="totalQuantity" class="col-sm-6 col-form-label">Total Quantity</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="totalQuantity" name="totalQuantity" readonly>
                                            </div>
                                            @error('totalQuantity')
                                                <div class="col-sm-6 offset-sm-6 text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="totalPrice" class="col-sm-6 col-form-label">Total</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="totalPrice" name="totalPrice" readonly>
                                            </div>
                                            @error('totalPrice')
                                                <div class="col-sm-6 offset-sm-6 text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <input type="hidden" id="selectedProductsInput" name="selectedProducts">
                                <div class="form-group">
                                    {{-- <a href="{{ route('supplier_purchase.list') }}"><input type="button" value="cancel"
                                            class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a> --}}
                                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">Place
                                        Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('script')
    <script>
        // Initialize selected products object
        var selectedProducts = {};

        // Function to update selected products based on the checkboxes
        // Function to update selected products based on the checkboxes
        function updateSelectedProducts() {
            var totalQuantity = 0;
            var totalPrice = 0;

            // Iterate over selected products and update total quantity and price
            Object.values(selectedProducts).forEach(function(product) {
                totalQuantity += product.quantity;
                totalPrice += product.price * product.quantity;
            });

            // Update total quantity and total price in the form
            document.getElementById('totalQuantity').value = totalQuantity;
            document.getElementById('totalPrice').value = totalPrice.toFixed(2);

            // Update the selected products textarea with the names and quantities of selected products
            var selectedProductsTextarea = document.getElementById('selectedProducts');
            selectedProductsTextarea.value = Object.values(selectedProducts).map(function(product) {
                return product.name + ' x ' + product.quantity;
            }).join('\n');

            // Update the hidden input field with selectedProducts data
            document.getElementById('selectedProductsInput').value = JSON.stringify(selectedProducts);
        }


        // Function to handle checkbox change event
        function handleCheckboxChange(checkbox) {
            var productId = checkbox.value;
            var row = checkbox.closest('tr');
            var productNameCell = row.querySelector('td:nth-child(3)');
            var productName = productNameCell.innerText;
            var priceCell = row.querySelector('td:nth-child(4)');
            var price = parseFloat(priceCell.innerText);

            if (checkbox.checked) {
                // If checkbox is checked, add the product to selectedProducts
                selectedProducts[productId] = {
                    id: productId,
                    name: productName,
                    quantity: 1, // You may adjust the initial quantity as needed
                    price: price
                };
            } else {
                // If checkbox is unchecked, remove the product from selectedProducts
                delete selectedProducts[productId];
            }

            // Update selected products
            updateSelectedProducts();
        }

        // Function to handle quantity change
        // function handleQuantityChange(input) {
        //     var productId = input.closest('tr').querySelector('input[type="checkbox"]').value;
        //     var quantity = parseInt(input.value);
        //     if (selectedProducts[productId]) {
        //         selectedProducts[productId].quantity = quantity;
        //     }
        //     updateSelectedProducts();
        // }

        // Bind the handleCheckboxChange function to checkbox change event
        document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                handleCheckboxChange(this);
            });
        });

        // Bind the handleQuantityChange function to input and change events of quantity input fields
        document.querySelectorAll('input[type="number"]').forEach(function(quantityInput) {
            quantityInput.addEventListener('input', function() {
                handleQuantityChange(this);
            });
            quantityInput.addEventListener('change', function() {
                handleQuantityChange(this);
            });
        });

        // Initialize Select2
        $(document).ready(function() {

            $('#supplier').select2();

            $('#payment').select2();
        });

        // Call the function initially to populate the selected products textarea
        updateSelectedProducts();
    </script>
    <script>
        // Function to handle quantity change
        function handleQuantityChange(input) {
            var checkbox = input.closest('tr').querySelector('input[type="checkbox"]');
            // Check if the corresponding checkbox is checked
            if (!checkbox.checked) {
                // If not checked, reset the quantity input value to 1
                input.value = 1;
                return; // Exit the function, preventing further execution
            }

            var productId = checkbox.value;
            var quantity = parseInt(input.value);
            if (selectedProducts[productId]) {
                selectedProducts[productId].quantity = quantity;
            }
            updateSelectedProducts();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
