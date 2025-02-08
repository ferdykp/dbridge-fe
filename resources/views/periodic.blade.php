@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                        <div class="card-header">
                            <form action="{{ route('periodic.import') }}" method="POST" enctype="multipart/form-data"
                                class="d-flex">
                                @csrf
                                <div class="form-group me-2">
                                    <label for="file">Upload periodic File in Excel</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Import periodic</button>
                            </form>
                        </div>
                    @endif

                    <div class="card-header pb-0 d-flex justify-content-between">
                        @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <button class="btn btn-danger me-2" id="delete_selected">Delete Selected</button>
                                    <a href="{{ route('periodic.create') }}" class="btn btn-md btn-success me-2">
                                        Add periodic
                                    </a>
                        @endif
                        <a href="{{ route('periodic.export') }}" class="btn btn-md btn-warning">
                            <i class="fa fa-download"></i> Export Data periodic in Excel
                        </a>
                    </div>
                </div>

                <div class="w-25">
                    <input type="text" id="search" data-route="{{ route('dynamic.search', ['type' => 'periodic']) }}"
                        name="search" placeholder="Search periodic Code" autocomplete="off" class="form-control">
                </div>
            </div>

            <div class="card-header pb-0">
                <h6>Data periodic</h6>
            </div>

            <div class="card-body px-0 pt-0 pb-4">
                <div class="table-responsive p-0">
                    <table id="datatable" class="table align-items-center mb-0" data-type="periodic">
                        <thead class="table-light">
                            <tr>
                                @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                                    <th class="text-center"><input type="checkbox" id="select_all_id"></th>
                                @endif
                                <th class="text-center">No</th>
                                <th class="text-center">DSTRC_ORI</th>
                                <th class="text-center">CREATION_DATE</th>
                                <th class="text-center">AUTHSD_DATE</th>
                                <th class="text-center">WO_DESC</th>
                                <th class="text-center">ACUAN PLAN SERVICE</th>
                                <th class="text-center">Componen_Desc</th>
                                <th class="text-center">EGI</th>
                                <th class="text-center">EGI ENG</th>
                                <th class="text-center">EQUIP_NO</th>
                                <th class="text-center">Plant Process</th>
                                <th class="text-center">Plant Activity</th>
                                <th class="text-center">WR_NO</th>
                                <th class="text-center">WR_ITEM</th>
                                <th class="text-center">QTY_REQ</th>
                                <th class="text-center">Stock_Code</th>
                                <th class="text-center">Mnemonic</th>
                                <th class="text-center">PART_NUMBER</th>
                                <th class="text-center">PN_GLOBAL</th>
                                <th class="text-center">ITEM_NAME</th>
                                <th class="text-center">STOCK_TYPE_DISTRICT</th>
                                <th class="text-center">CLASS</th>
                                <th class="text-center">HOME_WH</th>
                                <th class="text-center">UOI</th>
                                <th class="text-center">ISSUING PRICE</th>
                                <th class="text-center">PRICE_CODE</th>
                                <th class="text-center">Notes</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @include('partials.wr_table', [
                                'data' => $periodic,
                                'routePrefix' => 'periodic',
                            ])
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
