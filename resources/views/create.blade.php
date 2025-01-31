@extends('layouts.master')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('wr.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">DSTRC_ORI</label>
                                <input type="text" class="form-control @error('dstrc_ori') is-invalid @enderror"
                                    name="dstrc_ori" value="{{ old('dstrc_ori') }}" placeholder="Insert DSTRC_ORI">

                                <!-- error message untuk title -->
                                @error('dstrc_ori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Creation Date</label>
                                        <input type="date"
                                            class="form-control @error('creation_date') is-invalid @enderror"
                                            name="creation_date" value="{{ old('creation_date') }}">

                                        <!-- error message untuk title -->
                                        @error('creation_date')
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
                                        <label class="font-weight-bold mb-3">AUTHSD_DATE</label>
                                        <input type="date"
                                            class="form-control @error('authsd_date') is-invalid @enderror"
                                            name="authsd_date" value="{{ old('authsd_date') }}">

                                        <!-- error message untuk title -->
                                        @error('authsd_date')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">WO_Desc</label>
                                <input type="text" class="form-control @error('wo_desc') is-invalid @enderror"
                                    name="wo_desc" value="{{ old('wo_desc') }}" placeholder="Insert WO_DESC">

                                <!-- error message untuk title -->
                                @error('wo_desc')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Acuan Plan Service</label>
                                        <input type="date"
                                            class="form-control @error('acuan_plan_service') is-invalid @enderror"
                                            name="acuan_plan_service" value="{{ old('acuan_plan_service') }}">

                                        <!-- error message untuk title -->
                                        @error('acuan_plan_service')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">Componen Desc</label>
                                <input type="text" class="form-control @error('componen_desc') is-invalid @enderror"
                                    name="componen_desc" value="{{ old('componen_desc') }}"
                                    placeholder="Insert Componen Desc">

                                <!-- error message untuk title -->
                                @error('componen_desc')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">EGI</label>
                                <input type="text" style="text-transform:uppercase"
                                    class="form-control @error('egi') is-invalid @enderror" name="egi"
                                    value="{{ old('egi') }}" placeholder="Insert EGI">

                                <!-- error message untuk title -->
                                @error('egi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">EGI ENG</label>
                                <input type="text" style="text-transform:uppercase"
                                    class="form-control @error('egi_eng') is-invalid @enderror" name="egi_eng"
                                    value="{{ old('egi_eng') }}" placeholder="Insert EGI ENG">

                                <!-- error message untuk title -->
                                @error('egi_eng')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">EQUIP_NO</label>
                                <input type="text" class="form-control @error('equip_no') is-invalid @enderror"
                                    name="equip_no" value="{{ old('equip_no') }}" placeholder="Insert EQUIP_NO">

                                <!-- error message untuk title -->
                                @error('equip_no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Plant Process</label>
                                        <select class="form-select @error('plant_process') is-invalid @enderror"
                                            aria-label="Default select example" name="plant_process"
                                            value="{{ old('plant_process') }}">
                                            <option value="" disabled selected hidden>--- Insert Plant Process ---
                                            </option>
                                            <option value="SCHEDULED">SCHEDULED</option>
                                            <option value="NON PLANT">NON PLANT</option>
                                        </select>
                                        <!-- error message untuk title -->
                                        @error('plant_process')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">Plant Activity</label>
                                <input type="text"
                                    class="form-control @error('plant_activity') is-invalid @enderror"
                                    name="plant_activity" value="{{ old('plant_activity') }}"
                                    placeholder="Insert Plant Activity">

                                <!-- error message untuk title -->
                                @error('plant_activity')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">WR_NO</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('wr_no') is-invalid @enderror" name="wr_no"
                                            value="{{ old('wr_no') }}" placeholder="Insert WR_NO">
                                        <!-- error message untuk title -->
                                        @error('wr_no')
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
                                        <label class="font-weight-bold mb-3">WR_ITEM</label>
                                        <input type="text" onkeypress="return /[0-9]/i.test(event.key)"
                                            class="form-control @error('wr_item') is-invalid @enderror"
                                            name="wr_item"
                                            value="{{ str_pad(old('wr_item', '0'), 4, '0', STR_PAD_LEFT) }}" />

                                        <!-- error message untuk title -->
                                        @error('wr_item')
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
                                        <label class="font-weight-bold mb-3">QTY_REQ</label>
                                        <input type="number"
                                            class="form-control @error('qty_req') is-invalid @enderror"
                                            name="qty_req" value="{{ old('qty_req') }}"
                                            placeholder="Insert QTY_REQ">
                                        <!-- error message untuk title -->
                                        @error('qty_req')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">Stock Code</label>
                                <select class="form-select @error('stock_code') is-invalid @enderror"
                                    name="stock_code" id="stock_code">
                                    <option value="" disabled selected hidden>--- Select Stock Code ---</option>
                                    @foreach ($stockCode as $stock)
                                        <option value="{{ $stock->stock_code }}"
                                            {{ old('stock_code') == $stock->stock_code ? 'selected' : '' }}>
                                            {{ $stock->stock_code }} - {{ $stock->item_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('stock_code')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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

                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">Notes</label>
                                <input type="text" class="form-control @error('notes') is-invalid @enderror"
                                    name="notes" value="{{ old('notes') }}" placeholder="Insert Notes">
                                <!-- error message untuk title -->
                                @error('notes')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror"
                                            aria-label="Default select example" name="status"
                                            value="{{ old('status') }}">
                                            <option value="" disabled selected hidden>--- Insert Status ---
                                            </option>
                                            <option value="complete">Complete</option>
                                            <option value="continue">Continue</option>
                                        </select>
                                        <!-- error message untuk title -->
                                        @error('status')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">Add</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection