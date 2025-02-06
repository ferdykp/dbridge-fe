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
                        <div>
                            <a href="{{ route('stockCode.export') }}" class="btn btn-md btn-warning"><i
                                    class="fa fa-download"></i>
                                Export</a>
                        </div>
                        <div>
                            <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data"
                                class="d-flex">
                                @csrf
                                <div class="form-group me-2">
                                    <label for="file">Upload StockCode File in Excel</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Import Stock Code</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <div>
                            <input type="text" id="search" name="search" placeholder="Search Stock Code"
                                autocomplete="off" class="form-control">
                        </div>
                        <a href="{{ route('stockCode.create') }}" class="btn btn-md btn-success">Add Stock Code</a>
                    </div>

                    <div class="card-body px-0 pt-0 pb-4">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0 mx-3">
                                <thead class="table-light">
                                    <tr>
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
                                    @forelse ($stockCode as $index => $stockCodes)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $stockCodes->stock_code }}</td>
                                            <td class="text-center">{{ $stockCodes->price_code }}</td>
                                            <td class="text-center">{{ $stockCodes->item_name }}</td>
                                            <td class="text-center">{{ $stockCodes->class }}</td>
                                            <td class="text-center">{{ $stockCodes->stock_type_district }}</td>
                                            <td class="text-center">{{ $stockCodes->mnemonic }}</td>
                                            <td class="text-center">{{ $stockCodes->part_number }}</td>
                                            <td class="text-center">{{ $stockCodes->pn_global }}</td>
                                            <td class="text-center">{{ $stockCodes->home_wh }}</td>
                                            <td class="text-center">{{ $stockCodes->uoi }}</td>
                                            <td class="text-center">{{ $stockCodes->issuing_price }}</td>
                                            <td class="d-flex justify-content-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('stockCode.destroy', $stockCodes->id) }}"
                                                    method="POST" class="d-flex gap-2">
                                                    <a href="{{ route('stockCode.show', $stockCodes->id) }}"
                                                        class="btn btn-sm btn-dark">Show</a>
                                                    <a href="{{ route('stockCode.edit', $stockCodes->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="13" class="text-center">
                                                <div class="alert alert-danger text-center">
                                                    Data Barang belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination my-3 mx-3">
                            {{ $stockCode->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
