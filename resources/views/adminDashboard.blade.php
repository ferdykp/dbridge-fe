@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <div>
                            <form action="{{ route('wr.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">Upload Excel File</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Import WR</button>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('wr.create') }}" class="btn btn-md btn-success">Add Data WR</a>
                        </div>
                        <div>
                            <a href="{{ route('wr.export') }}" class="btn btn-md btn-warning"><i class="fa fa-download"></i>
                                Export User Data</a>
                        </div>
                    </div>
                    <div class="card-header pb-0">
                        <h6>Authors table</h6>
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
                                <tbody>
                                    @forelse ($wr as $index => $wr)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $wr->dstrc_ori }}</td>
                                            <td class="text-center">{{ $wr->creation_date }}</td>
                                            <td class="text-center">{{ $wr->authsd_date }}</td>
                                            <td class="text-center">{{ $wr->wo_desc }}</td>
                                            <td class="text-center">{{ $wr->acuan_plan_service }}</td>
                                            <td class="text-center">{{ $wr->componen_desc }}</td>
                                            <td class="text-center">{{ $wr->egi }}</td>
                                            <td class="text-center">{{ $wr->egi_eng }}</td>
                                            <td class="text-center">{{ $wr->equip_no }}</td>
                                            <td class="text-center">{{ $wr->plant_process }}</td>
                                            <td class="text-center">{{ $wr->plant_activity }}</td>
                                            <td class="text-center">{{ $wr->wr_no }}</td>
                                            <td class="text-center">{{ $wr->wr_item }}</td>
                                            <td class="text-center">{{ $wr->qty_req }}</td>
                                            <td class="text-center">{{ $wr->stock_code }}</td>
                                            <td class="text-center">{{ $wr->mnemonic }}</td>
                                            <td class="text-center">{{ $wr->part_number }}</td>
                                            <td class="text-center">{{ $wr->pn_global }}</td>
                                            <td class="text-center">{{ $wr->item_name }}</td>
                                            <td class="text-center">{{ $wr->stock_type_district }}</td>
                                            <td class="text-center">{{ $wr->class }}</td>
                                            <td class="text-center">{{ $wr->home_wh }}</td>
                                            <td class="text-center">{{ $wr->uoi }}</td>
                                            <td class="text-center">{{ $wr->issuing_price }}</td>
                                            <td class="text-center">{{ $wr->price_code }}</td>
                                            <td class="text-center">{{ $wr->notes }}</td>
                                            <td class="text-center">{{ $wr->status }}</td>
                                            <td class="d-flex justify-content-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('wr.destroy', $wr->id) }}" method="POST"
                                                    class="d-flex gap-2">
                                                    <a href="{{ route('wr.show', $wr->id) }}"
                                                        class="btn btn-sm btn-dark">Show</a>
                                                    <a href="{{ route('wr.edit', $wr->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50">
                                                <div class="alert alert-danger text-center">
                                                    Data Barang belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
