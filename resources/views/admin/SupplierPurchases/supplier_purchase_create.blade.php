@extends('admin.layouts.master')
@section('style')
    <style>
            .table{
                bcakground-color: white;
            }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Select Products to Order</h4>
                    <table class="table"  style="background-color:white" id="">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
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
                                            onchange="updateSelectedProducts(this)">
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
                                <div class="form-group">
                                    <label for="invoice_id" class="form-label" >Invoice ID</label>
                                    <input type="text" class="form-control" id="invoice_id" name="invoice_id" placeholder="Invoice ID">
                                </div>
                                @error('invoice_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                <div class="form-group">
                                    <label for="supplier" class="form-label">Supplier Name</label>
                                    <select id="supplier" name="supplier" class="form-control">
                                        <option value="">Choose Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
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
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Mobile Banking">Mobile Banking</option>
                                    </select>
                                </div>
                                @error('payment')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                <hr>
                                <div class="form-group">
                                    <label for="selectedProducts" class="form-label">Selected Products</label>
                                    <textarea id="selectedProducts" name="selectedProducts" rows="4" class="form-control" readonly></textarea>
                                </div>
                                @error('selectedProducts')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                <div class="form-group">
                                    <label for="totalQuantity" class="form-label">Total Quantity</label>
                                    <input type="text" class="form-control" id="totalQuantity" name="totalQuantity"
                                        readonly>
                                </div>
                                <br>
                                @error('totalQuantity')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="totalPrice" class="form-label">Total</label>
                                    <input type="text" class="form-control" id="totalPrice" name="totalPrice" readonly>
                                </div>
                                @error('totalPrice')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                <input type="hidden" id="selectedProductsInput" name="selectedProducts">
                                <div class="form-group">
                                    {{-- <a href="{{ route('supplier_purchase.list') }}"><input type="button" value="cancel"
                                            class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a> --}}
                                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">Place Order</button>
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

    function updateSelectedProducts(checkbox) {
        var selectedProducts = [];
        var totalQuantity = 0;
        var totalPrice = 0;
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

        checkboxes.forEach(function(checkbox) {
            var row = checkbox.closest('tr');

            var productNameCell = row.querySelector(
                'td:nth-child(3)');
            var quantityInput = row.querySelector('input[type="number"]');
            var priceCell = row.querySelector('td:nth-child(4)');
            var productId = checkbox.value;
            var productName = productNameCell.innerText;
            var quantity = parseInt(quantityInput.value);
            var price = parseFloat(priceCell.innerText.replace('$', ''));

            totalQuantity += quantity;
            totalPrice += price * quantity;

            selectedProducts.push({
                id: productId,
                name: productName,
                quantity: quantity,
                price: price
            });
        });

        document.getElementById('selectedProductsInput').value = JSON.stringify(selectedProducts);
        document.getElementById('totalQuantity').value = totalQuantity;
        document.getElementById('totalPrice').value = totalPrice.toFixed(2);

        // Update the selected products textarea
        var selectedProductsTextarea = document.getElementById('selectedProducts');
        selectedProductsTextarea.value = selectedProducts.map(function(product) {
            return product.name + ' x ' + product.quantity;
        }).join('\n');
    }

    // Call the function initially to populate the selected products textarea
    updateSelectedProducts();

</script>
@endsection
