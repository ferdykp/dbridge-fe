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
                        <div>
                            <form action="{{ route('wr.import') }}" method="POST" enctype="multipart/form-data"
                                class="d-flex">
                                @csrf
                                <div class="form-group me-2">
                                    <label for="file">Upload WR File in Excel</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Import WR</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <a href="{{ route('wr.create') }}" class="btn btn-md btn-success me-2">Add WR</a>
                                <a href="{{ route('wr.export') }}" class="btn btn-md btn-warning">
                                    <i class="fa fa-download"></i> Export Data in Excel
                                </a>
                            </div>
                            <div class="mt-2">
                                <a class="btn btn-danger" id="delete_selected">Delete Selected</a>
                            </div>
                        </div>
                        <div class="w-25"> <!-- Adjust the width as needed -->
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
                                        <th style="white-space: nowrap;" class="text-center">DSTRC_ORI</th>
                                        <th style="white-space: nowrap;" class="text-center">CREATION_DATE</th>
                                        <th style="white-space: nowrap;" class="text-center">AUTHSD_DATE</th>
                                        <th style="white-space: nowrap;" class="text-center">WO_DESC</th>
                                        <th style="white-space: nowrap;" class="text-center">ACUAN PLAN SERVICE</th>
                                        <th style="white-space: nowrap;" class="text-center">Componen_Desc</th>
                                        <th style="white-space: nowrap;" class="text-center">EGI</th>
                                        <th style="white-space: nowrap;" class="text-center">EGI ENG</th>
                                        <th style="white-space: nowrap;" class="text-center">EQUIP_NO</th>
                                        <th style="white-space: nowrap;" class="text-center">Plant Process</th>
                                        <th style="white-space: nowrap;" class="text-center">Plant Activity</th>
                                        <th style="white-space: nowrap;" class="text-center">WR_NO</th>
                                        <th style="white-space: nowrap;" class="text-center">WR_ITEM</th>
                                        <th style="white-space: nowrap;" class="text-center">QTY_REQ</th>
                                        <th style="white-space: nowrap;" class="text-center">Stock_Code</th>
                                        <th style="white-space: nowrap;" class="text-center">Mnemonic</th>
                                        <th style="white-space: nowrap;" class="text-center">PART_NUMBER</th>
                                        <th style="white-space: nowrap;" class="text-center">PN_GLOBAL</th>
                                        <th style="white-space: nowrap;" class="text-center">ITEM_NAME</th>
                                        <th style="white-space: nowrap;" class="text-center">STOCK_TYPE_DISTRICT</th>
                                        <th style="white-space: nowrap;" class="text-center">CLASS</th>
                                        <th style="white-space: nowrap;" class="text-center">HOME_WH</th>
                                        <th style="white-space: nowrap;" class="text-center">UOI</th>
                                        <th style="white-space: nowrap;" class="text-center">ISSUING PRICE</th>
                                        <th style="white-space: nowrap;" class="text-center">PRICE_CODE</th>
                                        <th style="white-space: nowrap;" class="text-center">Notes</th>
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
