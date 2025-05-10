@extends('layouts.master')

@section('content')
    <style>
        hr {
            border: 1px solid #ccc !important;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-header">
                        <form action="{{ route('stockCode.import') }}" method="POST" enctype="multipart/form-data"
                            class="d-flex flex-column flex-md-row align-items-start align-items-md-center">
                            @csrf
                            <div class="form-group me-md-2 w-100 w-md-25">
                                <label for="file">Upload StockCode File in Excel</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 mt-md-4">Import Stock Code</button>
                        </form>
                    </div>
                    <div
                        class="card-header pb-0 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div class="d-flex flex-column w-100 w-md-auto mb-2 mb-md-0">
                            <div class="d-flex flex-column flex-sm-row">
                                <button class="btn btn-danger me-2 mb-2 mb-sm-0" id="delete_selected">Delete
                                    Selected</button>
                                <a href="{{ route('stockCode.create') }}"
                                    class="btn btn-md btn-success me-2 mb-2 mb-sm-0">Add Stock Code</a>
                                <a href="{{ route('stockCode.export') }}" class="btn btn-md btn-warning me-2 mb-2 mb-sm-0">
                                    <i class="fa fa-download"></i> Export Data in Excel
                                </a>
                            </div>
                        </div>
                        <div class="w-100 w-md-25"> <!-- Adjust the width as needed -->
                            <input type="text" id="search" data-route="{{ route('stockCode.search') }}" name="search"
                                placeholder="Search Stock Code" autocomplete="off" class="form-control">
                        </div>
                    </div>

                    <div class="card-header pb-0">
                        <h6>Data Stock Code</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-4">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0 mx-3" data-type="stockCode">
                                <thead class="table-light">
                                    <tr>
                                        @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                                            <th class="text-center"><input type="checkbox" id="select_all_id"></th>
                                        @endif
                                        <th class="text-center">No</th>
                                        <th class="text-center">Stock_Code</th>
                                        <th class="text-center">Price_Code</th>
                                        <th class="text-center">ITEM_NAME</th>
                                        <th class="text-center">CLASS</th>
                                        <th class="text-center">Current Class</th>
                                        <th class="text-center">Mnemonic Current</th>
                                        <th class="text-center">PN Current</th>
                                        <th class="text-center">PN Global</th>
                                        <th class="text-center">WH</th>
                                        <th class="text-center">UOI</th>
                                        <th class="text-center">Notes</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @include('partials.stock_table')
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                Showing {{ $stockCode->firstItem() }} to {{ $stockCode->lastItem() }} of
                                {{ $stockCode->total() }} entries
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $stockCode->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
