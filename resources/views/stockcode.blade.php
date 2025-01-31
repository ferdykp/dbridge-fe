@extends('layouts.master')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('wr.store') }}" method="POST">
                        @csrf
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Stock Code</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('stock_code') is-invalid @enderror"
                                            name="stock_code" value="{{ old('stock_code') }}"
                                            placeholder="Insert Stock Code">
                                        <!-- error message untuk title -->
                                        @error('stock_code')
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
                                        <label class="font-weight-bold mb-3">Price_Code</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('price_code') is-invalid @enderror"
                                            name="price_code" value="{{ old('price_code') }}"
                                            placeholder="Insert Price Code">
                                        <!-- error message untuk title -->
                                        @error('price_code')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">ITEM_NAME</label>
                                <input type="text" style="text-transform:uppercase"
                                    class="form-control @error('item_name') is-invalid @enderror" name="item_name"
                                    value="{{ old('item_name') }}" placeholder="Insert Item Name">
                                <!-- error message untuk title -->
                                @error('price_code')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Class</label>
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
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Current Class</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('current_class') is-invalid @enderror"
                                            name="current_class" value="{{ old('current_class') }}"
                                            placeholder="Insert Current Class">
                                        <!-- error message untuk title -->
                                        @error('current_class')
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
                                        <label class="font-weight-bold mb-3">Mnemonic Current</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('mnemonic_current') is-invalid @enderror"
                                            name="mnemonic_current" value="{{ old('mnemonic_current') }}"
                                            placeholder="Insert Mnemonic Current">
                                        <!-- error message untuk title -->
                                        @error('mnemonic_current')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">PN Current</label>
                                <input type="text" style="text-transform:uppercase"
                                    class="form-control @error('pn_current') is-invalid @enderror" name="pn_current"
                                    value="{{ old('pn_current') }}" placeholder="Insert PN Current">
                                <!-- error message untuk title -->
                                @error('pn_current')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">PN Global</label>
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">WH</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('wh') is-invalid @enderror" name="wh"
                                            value="{{ old('wh') }}" placeholder="Insert WH">
                                        <!-- error message untuk title -->
                                        @error('wh')
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
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Tambah User</button>
                    </form>
                </div>
            </div>
            </div>
    </div>
  @endsection
