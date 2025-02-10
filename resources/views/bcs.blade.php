@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                        <div class="card-header">
                            <div>
                                <form action="{{ route('bcs.import') }}" method="POST" enctype="multipart/form-data"
                                    class="d-flex flex-column flex-md-row align-items-start align-items-md-center">
                                    @csrf
                                    <div class="form-group me-md-2 w-100 w-md-25">
                                        <label for="file">Upload BCS File in Excel</label>
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2 mt-md-4">Import BCS</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div
                        class="card-header pb-0 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                            <div class="d-flex flex-column w-100 w-md-auto mb-2 mb-md-0">
                                <div class="d-flex flex-column flex-sm-row">
                                    <button class="btn btn-danger me-2 mb-2 mb-sm-0" id="delete_selected">Delete
                                        Selected</button>
                                    <a href="{{ route('bcs.create') }}" class="btn btn-md btn-success me-2 mb-2 mb-sm-0">Add
                                        BCS</a>
                        @endif
                        <a href="{{ route('bcs.export') }}" class="btn btn-md btn-warning me-2 mb-2 mb-sm-0"><i
                                class="fa fa-download"></i>Export Data BCS in Excel</a>
                    </div>
                </div>
                <div class="form-group me-md-2 w-100 w-md-25">
                    <input type="text" id="search" data-route="{{ route('dynamic.search', ['type' => 'bcs']) }}"
                        name="search" placeholder="Search BCS Code" autocomplete="off" class="form-control">
                </div>
            </div>
            <div class="card-header pb-0">
                <h6>Data BCS</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-4">
                <div class="table-responsive p-0">
                    <table id="datatable" class="table align-items-center mb-0" data-type="bcs">
                        <thead class="table-light">
                            <tr>
                                @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                                    <th style="white-space: nowrap;" class="text-center"><input type="checkbox"
                                            name="select_all" id="select_all_id"></th>
                                @endif
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
                            @include('partials.wr_table', ['data' => $bcs, 'routePrefix' => 'bcs'])
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        Showing {{ $bcs->firstItem() }} to {{ $bcs->lastItem() }} of
                        {{ $bcs->total() }} entries
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $bcs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
