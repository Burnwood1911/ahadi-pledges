@extends('adminlte::page')





@section('content')

 <!-- Modal Delete Purpose -->
 <div class="modal fade" id="deletePurpose" tabindex="-1" role="dialog"
 aria-labelledby="deletePurposeTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLongTitle">Delete Purpose
             </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
            @foreach ($purposes as $purpose)
                <div class="row d-flex flex-row">
                    <p>{{ $purpose->title }}</p>
                    <form action="/purposes/delete/{{ $purpose->id }}" method="POST">
                        @csrf
                        <button class="btn btn-primary ml-2" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            @endforeach
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

         </div>
     </div>
 </div>
</div>

<div>
    <!-- Modal Create Purpose -->
    <div class="modal fade" id="createPurpose" tabindex="-1" role="dialog"
        aria-labelledby="createPurposeTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Purpose
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/pledges/purpose/create" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="title" id="title" placeholder="title"
                            class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="">
    <div class="d-flex flex-column pt-2">
        <div class="d-flex flex-row justify-content-between">
            <div class="pl-3">
                <a href="/pledges/create/" class="btn btn-success">Create Pledge</a>
                <button type="button" class="btn btn-dark ml-1" data-toggle="modal" data-target="#createPurpose">
                    Create Purpose
                </button>

                <button type="button" class="btn btn-dark ml-1" data-toggle="modal" data-target="#deletePurpose">
                    Delete Purpose
                </button>
                
            </div>

            <div>
            

                <div class="d-flex align-self-end">
                    <form action="/pledges" class="d-flex">
                        <div class="input-group mr-3">

                            <input type="text" class="form-control" name="tag" placeholder="search" aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>




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
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Purpose</th>
                                    <th>Amount</th>
                                    <th>Deadline</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($pledges as $pledge)
                                <tr>

                                    <td>{{ $pledge->id }}</td>
                                    <td>{{ ucfirst($pledge->user->first_name) . ' ' .
                                        ucfirst($pledge->user->second_name) . ' ' . ucfirst($pledge->user->last_name) }}

                                    <td>{{ $pledge->purpose->title }}</td>
                                    <td>{{ $pledge->amount }}</td>
                                    <td>{{ $pledge->deadline }}</td>
                                    <td>
                                        <a href="/pledges/edit/{{ $pledge->id }}"
                                            class="btn btn-primary btn-sm bg-gradient-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>


                                        <a href="/pledges/delete/{{ $pledge->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        {{-- <a href="/pledges/view/{{ $pledge->id }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a> --}}

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>

            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $pledges->links() }}
    </div>

    @endsection