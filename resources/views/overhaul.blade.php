@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                        <div class="card-header">
                            <div>
                                <form action="{{ route('overhaul.import') }}" method="POST" enctype="multipart/form-data"
                                    class="d-flex">
                                    @csrf
                                    <div class="form-group me-2">
                                        <label for="file">Upload Overhaul File in Excel</label>
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Import Overhaul</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="card-header pb-0 d-flex justify-content-between">
                        @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <a class="btn btn-danger me-2" id="delete_selected">Delete Selected</a>
                                    <a href="{{ route('overhaul.create') }}" class="btn btn-md btn-success me-2">Add
                                        Overhaul</a>
                        @endif
                        <a href="{{ route('overhaul.export') }}" class="btn btn-md btn-warning"><i
                                class="fa fa-download"></i>Export Data Overhaul in Excel</a>
                    </div>
                </div>
                <div class="w-25"> <!-- Adjust the width as needed -->
                    <input type="text" id="search" data-route="{{ route('dynamic.search', ['type' => 'overhaul']) }}"
                        name="search" placeholder="Search Overhaul" autocomplete="off" class="form-control">
                </div>
            </div>
            <div class="card-header pb-0">
                <h6>Data Overhaul</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-4">
                <div class="table-responsive p-0">
                    <table id="datatable" class="table align-items-center mb-0" data-type="overhaul">
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
                            @include('partials.wr_table', [
                                'data' => $overhaul,
                                'routePrefix' => 'overhaul',
                            ])
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        Showing {{ $overhaul->firstItem() }} to {{ $overhaul->lastItem() }} of
                        {{ $overhaul->total() }} entries
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $overhaul->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
