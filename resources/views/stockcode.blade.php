@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('stockCode.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">Stock Code</label>
                            <input type="text" style="text-transform:uppercase"
                                class="form-control @error('stock_code') is-invalid @enderror" name="stock_code"
                                value="{{ old('stock_code') }}" placeholder="Insert Stock Code">
                            @error('stock_code')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">MNEMONIC</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('mnemonic') is-invalid @enderror" name="mnemonic"
                                        value="{{ old('mnemonic') }}" placeholder="Insert Price Code">
                                    <!-- error message untuk title -->
                                    @error('mnemonic')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">PART_NUMBER</label>
                            <input type="text" style="text-transform:uppercase"
                                class="form-control @error('part_number') is-invalid @enderror" name="part_number"
                                value="{{ old('part_number') }}" placeholder="Insert Part Number">
                            <!-- error message untuk title -->
                            @error('part_number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">PN_GLOBAL</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('pn_global') is-invalid @enderror" name="pn_global"
                                        value="{{ old('pn_global') }}" placeholder="Insert PN Global">
                                    <!-- error message untuk title -->
                                    @error('pn_global')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">ITEM_NAME</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('item_name') is-invalid @enderror" name="item_name"
                                        value="{{ old('item_name') }}" placeholder="Insert Item Name">
                                    <!-- error message untuk title -->
                                    @error('item_name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">STOCK_TYPE District</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('stock_type_district') is-invalid @enderror"
                                        name="stock_type_district" value="{{ old('stock_type_district') }}"
                                        placeholder="Insert Stock Type District">
                                    <!-- error message untuk title -->
                                    @error('stock_type_district')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">CLASS</label>
                            <input type="text" style="text-transform:uppercase"
                                class="form-control @error('class') is-invalid @enderror" name="class"
                                value="{{ old('class') }}" placeholder="Insert Class">
                            <!-- error message untuk title -->
                            @error('class')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">HOME_WH</label>
                            <input type="text" style="text-transform:uppercase"
                                class="form-control @error('home_wh') is-invalid @enderror" name="home_wh"
                                value="{{ old('home_wh') }}" placeholder="Insert Home WH">
                            <!-- error message untuk title -->
                            @error('home_wh')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">UOI</label>
                            <input type="text" style="text-transform:uppercase"
                                class="form-control @error('uoi') is-invalid @enderror" name="uoi"
                                value="{{ old('uoi') }}" placeholder="Insert UOI">
                            <!-- error message untuk title -->
                            @error('uoi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">ISSUING PRICE</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('issuing_price') is-invalid @enderror"
                                        name="issuing_price" value="{{ old('issuing_price') }}"
                                        placeholder="Insert Issuing Price">
                                    <!-- error message untuk title -->
                                    @error('issuing_price')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">Price Codde</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('price_code') is-invalid @enderror" name="price_code"
                                        value="{{ old('price_code') }}" placeholder="Insert Price Code">
                                    <!-- error message untuk title -->
                                    @error('price_code')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Stock Code</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
