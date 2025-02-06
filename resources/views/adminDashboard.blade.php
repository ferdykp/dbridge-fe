@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-header pb-0">
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
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('wr.create') }}" class="btn btn-md btn-success">Add Data WR</a>
                        </div>
                        <div>
                            <a href="{{ route('wr.export') }}" class="btn btn-md btn-warning"><i class="fa fa-download"></i>
                                Export Data WR</a>
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
                                <tbody>
                                    @forelse ($wr as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">{{ $item->dstrc_ori }}</td>
                                            <td class="text-center">{{ $item->creation_date }}</td>
                                            <td class="text-center">{{ $item->authsd_date }}</td>
                                            <td class="text-center">{{ $item->wo_desc }}</td>
                                            <td class="text-center">{{ $item->acuan_plan_service }}</td>
                                            <td class="text-center">{{ $item->componen_desc }}</td>
                                            <td class="text-center">{{ $item->egi }}</td>
                                            <td class="text-center">{{ $item->egi_eng }}</td>
                                            <td class="text-center">{{ $item->equip_no }}</td>
                                            <td class="text-center">{{ $item->plant_process }}</td>
                                            <td class="text-center">{{ $item->plant_activity }}</td>
                                            <td class="text-center">{{ $item->wr_no }}</td>
                                            <td class="text-center">{{ $item->wr_item }}</td>
                                            <td class="text-center">{{ $item->qty_req }}</td>
                                            <td class="text-center">{{ $item->stock_code }}</td>
                                            <td class="text-center">{{ $item->mnemonic }}</td>
                                            <td class="text-center">{{ $item->part_number }}</td>
                                            <td class="text-center">{{ $item->pn_global }}</td>
                                            <td class="text-center">{{ $item->item_name }}</td>
                                            <td class="text-center">{{ $item->stock_type_district }}</td>
                                            <td class="text-center">{{ $item->class }}</td>
                                            <td class="text-center">{{ $item->home_wh }}</td>
                                            <td class="text-center">{{ $item->uoi }}</td>
                                            <td class="text-center">{{ $item->issuing_price }}</td>
                                            <td class="text-center">{{ $item->price_code }}</td>
                                            <td class="text-center">{{ $item->notes }}</td>
                                            <td class="text-center">{{ $item->status }}</td>
                                            <td class="d-flex justify-content-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('wr.destroy', $item->id) }}" method="POST"
                                                    class="d-flex gap-2">
                                                    <a href="{{ route('wr.show', $item->id) }}"
                                                        class="btn btn-sm btn-dark">Show</a>
                                                    <a href="{{ route('wr.edit', $item->id) }}"
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
                        <div class="my-3 mx-3">
                            {{ $wr->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
