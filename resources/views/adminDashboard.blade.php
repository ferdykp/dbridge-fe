@extends('layouts.master')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-header">
                        <form action="{{ route('wr.import') }}" method="POST" enctype="multipart/form-data"
                            class="d-flex flex-column flex-md-row align-items-start align-items-md-center">
                            @csrf
                            <div class="form-group me-md-2 w-100 w-md-25">
                                <label for="file">Upload WR File in Excel</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 mt-md-4">Import WR</button>
                        </form>
                    </div>
                    <div
                        class="card-header pb-0 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div class="d-flex flex-column w-100 w-md-auto mb-2 mb-md-0">
                            <div class="d-flex flex-column flex-sm-row">
                                <button class="btn btn-danger me-2 mb-2 mb-sm-0" id="delete_selected">Delete
                                    Selected</button>
                                <a href="{{ route('wr.create') }}" class="btn btn-md btn-success me-2 mb-2 mb-sm-0">Add
                                    WR</a>
                                <a href="{{ route('wr.export') }}" class="btn btn-md btn-warning me-2 mb-2 mb-sm-0">
                                    <i class="fa fa-download"></i> Export Data in Excel
                                </a>
                            </div>
                        </div>
                        <div class="w-100 w-md-25"> <!-- Adjust the width as needed -->
                            <input type="text" id="search"
                                data-route="{{ route('dynamic.search', ['type' => 'wr']) }}" name="search"
                                placeholder="Search WR Code" autocomplete="off" class="form-control">
                        </div>
                    </div>

                    <div class="card-header pb-0">
                        <h6>Data WR</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-4">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0" data-type="wr">
                                <thead class="table-light">
                                    <tr>
                                        <th style="white-space: nowrap;" class="text-center"><input type="checkbox"
                                                name="select_all" id="select_all_id"></th>
                                        <th style="white-space: nowrap;" class="text-center">No</th>
                                        <th style="white-space: nowrap;" class="text-center">JOBSITE</th>
                                        <th style="white-space: nowrap;" class="text-center">CREATION DATE</th>
                                        <th style="white-space: nowrap;" class="text-center">AUTHORISED DATE</th>
                                        <th style="white-space: nowrap;" class="text-center">WO DESC</th>
                                        <th style="white-space: nowrap;" class="text-center">ACUAN PLAN SERVICE</th>
                                        <th style="white-space: nowrap;" class="text-center">Componen_Desc</th>
                                        <th style="white-space: nowrap;" class="text-center">EGI</th>
                                        <th style="white-space: nowrap;" class="text-center">EGI ENG</th>
                                        <th style="white-space: nowrap;" class="text-center">EQUIP_NO</th>
                                        <th style="white-space: nowrap;" class="text-center">Plant Process</th>
                                        <th style="white-space: nowrap;" class="text-center">Plant Activity</th>
                                        <th style="white-space: nowrap;" class="text-center">NO WR</th>
                                        <th style="white-space: nowrap;" class="text-center">ITEM WR</th>
                                        <th style="white-space: nowrap;" class="text-center">QUANTITY REQ</th>
                                        <th style="white-space: nowrap;" class="text-center">STOCK CODE</th>
                                        <th style="white-space: nowrap;" class="text-center">MNEMONIC</th>
                                        <th style="white-space: nowrap;" class="text-center">PN CURRENT</th>
                                        <th style="white-space: nowrap;" class="text-center">PN GLOBAL</th>
                                        <th style="white-space: nowrap;" class="text-center">ITEM NAME</th>
                                        <th style="white-space: nowrap;" class="text-center">STOCK TYPE DISTRICT</th>
                                        <th style="white-space: nowrap;" class="text-center">CLASS</th>
                                        <th style="white-space: nowrap;" class="text-center">WAREHOUSE</th>
                                        <th style="white-space: nowrap;" class="text-center">UOI</th>
                                        <th style="white-space: nowrap;" class="text-center">ISSUING PRICE</th>
                                        <th style="white-space: nowrap;" class="text-center">PRICE CODE</th>
                                        <th style="white-space: nowrap;" class="text-center">Notes</th>
                                        <th style="white-space: nowrap;" class="text-center">ETA</th>
                                        <th style="white-space: nowrap;" class="text-center">Status</th>
                                        <th style="white-space: nowrap;" class="text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @include('partials.wr_table', ['data' => $wr, 'routePrefix' => 'wr'])
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                Showing {{ $wr->firstItem() }} to {{ $wr->lastItem() }} of
                                {{ $wr->total() }} entries
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $wr->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
