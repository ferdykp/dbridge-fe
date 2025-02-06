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
                    <form action="{{ route('stockCode.update', $stockCode->id) }}   " method="POST">
                        @csrf
                        @method('PUT') <!-- Pastikan metode ini ada -->

                        <label class="form-label">Stock Code</label>
                        <input class="form-control mb-3" type="text" name="stock_code"
                            value="{{ old('stock_code', $stockCode->stock_code) }}" required>

                        <label class="form-label">Mnemonic</label>
                        <input class="form-control mb-3" type="text" name="mnemonic"
                            value="{{ old('mnemonic', $stockCode->mnemonic) }}" required>

                        <label class="form-label">Part Number</label>
                        <input class="form-control mb-3" type="text" name="part_number"
                            value="{{ old('part_number', $stockCode->part_number) }}" required>

                        <label class="form-label">PN Global</label>
                        <input class="form-control mb-3" type="text" name="pn_global"
                            value="{{ old('pn_global', $stockCode->pn_global) }}" required>

                        <label class="form-label">Item Name</label>
                        <input class="form-control mb-3" type="text" name="item_name"
                            value="{{ old('item_name', $stockCode->item_name) }}" required>

                        <label class="form-label">Stock Type District</label>
                        <input class="form-control mb-3" type="text" name="stock_type_district"
                            value="{{ old('stock_type_district', $stockCode->stock_type_district) }}" required>

                        <label class="form-label">Class</label>
                        <input class="form-control mb-3" type="text" name="class"
                            value="{{ old('class', $stockCode->class) }}" required>

                        <label class="form-label">Home WH</label>
                        <input class="form-control mb-3" type="text" name="home_wh"
                            value="{{ old('home_wh', $stockCode->home_wh) }}" required>

                        <label class="form-label">UOI</label>
                        <input class="form-control mb-3" type="text" name="uoi"
                            value="{{ old('uoi', $stockCode->uoi) }}" required>

                        <label class="form-label">Issuing Price</label>
                        <input class="form-control mb-3" type="number" name="issuing_price"
                            value="{{ old('issuing_price', $stockCode->issuing_price) }}" required>

                        <label class="form-label">Price Code</label>
                        <input class="form-control mb-3" type="text" name="price_code"
                            value="{{ old('price_code', $stockCode->price_code) }}" required>

                        <button type="submit" class="btn btn-primary">Edit Stock Code</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
