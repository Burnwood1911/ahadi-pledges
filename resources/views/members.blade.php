@extends('adminlte::page')



@section('content')
    <div class=" d-flex justify-content-between w-100 pt-2 pl-2">
        <div>
            <a href="/members/create" class="btn btn-success">Create Member</a>
            <a href="" class="btn btn-dark ml-1">Upload Excel</a>
        </div>

        <form action="/members" class="w-50">
            <div class="input-group mr-4">

                <input type="text" class="form-control" name="tag" placeholder="search" aria-label="Search"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                </div>

            </div>
        </form>

    </div>


    <!-- Begin Page Content -->
    <div class="container-fluid pt-3">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-light py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Full Names</th>
                                <th>Card No.</th>
                                <th>Jumuiya</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($data as $item)
                                <tr>

                                    <td>{{ ucfirst($item->first_name) . ' ' . ucfirst($item->second_name) . ' ' . ucfirst($item->last_name) }}
                                    </td>
                                    <td>{{ $item->card->card_no ?? 'UNASIGNED' }}</td>
                                    <td>{{ $item->jumuiya->name }}</td>
                                    <td>{{ strtoupper($item->gender) }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->enabled ? 'ACTIVE' : 'DISABLED' }}</td>
                                    <td>
                                        <a href="/members/edit/{{ $item->id }}"
                                            class="btn btn-primary btn-sm bg-gradient-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>

                            
                                        <a href="/members/delete/{{ $item->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <a href="/members/disable/{{ $item->id }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-lock"></i>
                                        </a>



                                        @if ($item->card == null)
                                            <button type="button" class="" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                <i class="fa fa-credit-card"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Assign Card
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/members/card/update/{{ $item->id }}">
                                                            <div class="modal-body">
                                                                <select name="card_id" id="card_id"
                                                                    class="form-control bg-gradient-light">
                                                                    @foreach ($cards as $card)
                                                                        <option value="{{ $card->id }}">
                                                                            {{ $card->card_no }} </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>
    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>
@endsection
