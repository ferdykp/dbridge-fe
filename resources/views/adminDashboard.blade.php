@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-header">
                        <div>
                            <form action="{{ route('wr.import') }}" method="POST" enctype="multipart/form-data" class="d-flex">
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
                        <div class="d-flex">
                            <a href="{{ route('wr.create') }}" class="btn btn-md btn-success me-2">Add WR</a>
                            <a href="{{ route('wr.export') }}" class="btn btn-md btn-warning"><i
                                    class="fa fa-download"></i>Export Data in Excel</a>
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
                            <table id="datatable" class="table align-items-center mb-0">
                                <thead class="table-light">
                                    <tr>
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
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
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
