@extends('layouts.master')

@section('content')
    <style>
        hr {
            border: 1px solid #ccc !important;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-header mt-2">
                    <h4>
                        Form Tambah Stock Code
                    </h4>
                </div>
                <hr>
                <h3> Data Stock Code 1 </h3>
                <div class="card-body">
                    <form action="{{ route('stockCode.update', $stockCode->id) }}" method="POST">
                        @csrf

                        <div id="stockCodeFields">
                            <div class="stock-code-group mb-4">
                                <label class="form-label">Stock Code</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][stock_code]"
                                    value="{{ old('stock_code', $stockCode->stock_code) }}" required>
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="form-label">Mnemonic</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][mnemonic]"
                                    placeholder="Mnemonic">

                                <label class="form-label">Part Number</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][part_number]"
                                    placeholder="Part Number">

                                <label class="form-label">PN Global</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][pn_global]"
                                    placeholder="PN Global">

                                <label class="form-label">Item Name</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][item_name]"
                                    placeholder="Item Name">

                                <label class="form-label">Stock Type District</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][stock_type_district]"
                                    placeholder="Stock Type District">

                                <label class="form-label">Class</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][class]"
                                    placeholder="Class">

                                <label class="form-label">Home WH</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][home_wh]"
                                    placeholder="Home WH">

                                <label class="form-label">UOI</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][uoi]"
                                    placeholder="UOI">

                                <label class="form-label">Issuing Price</label>
                                <input class="form-control mb-3" type="number" name="stock_codes[0][issuing_price]"
                                    placeholder="Issuing Price">

                                <label class="form-label">Price Code</label>
                                <input class="form-control mb-3" type="text" name="stock_codes[0][price_code]"
                                    placeholder="Price Code">
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary" onclick="addStockCode()">Tambah Stock
                            Code</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let index = 1;

        function addStockCode() {
            let newRow = `
            <h3> Data Stock Code ${index + 1} </h3>
            <hr class="my-3">
            <div class="stock-code-group mb-4">
                <label class="form-label">Stock Code</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][stock_code]" placeholder="Stock Code">

                <label class="form-label">Mnemonic</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][mnemonic]" placeholder="Mnemonic">

                <label class="form-label">Part Number</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][part_number]" placeholder="Part Number">

                <label class="form-label">PN Global</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][pn_global]" placeholder="PN Global">

                <label class="form-label">Item Name</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][item_name]" placeholder="Item Name">

                <label class="form-label">Stock Type District</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][stock_type_district]" placeholder="Stock Type District">

                <label class="form-label">Class</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][class]" placeholder="Class">

                <label class="form-label">Home WH</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][home_wh]" placeholder="Home WH">

                <label class="form-label">UOI</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][uoi]" placeholder="UOI">

                <label class="form-label">Issuing Price</label>
                <input class="form-control mb-3" type="number" name="stock_codes[${index}][issuing_price]" placeholder="Issuing Price">

                <label class="form-label">Price Code</label>
                <input class="form-control mb-3" type="text" name="stock_codes[${index}][price_code]" placeholder="Price Code">
            </div>`;
            document.getElementById("stockCodeFields").insertAdjacentHTML('beforeend', newRow);
            index++;
        }
    </script>
@endsection
