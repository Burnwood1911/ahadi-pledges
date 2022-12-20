@extends('adminlte::page')



@section('content')


<div class="row pt-2 pl-3">
    <a href="/members/create" class="btn btn-success">Create Member</a>
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
                            
                            <td>{{ ucfirst($item->first_name) ." ". ucfirst($item->second_name) ." ". ucfirst($item->last_name) }}</td>
                            <td>119/21312</td>
                            <td>{{$item->jumuiya->name}}</td>
                            <td>{{strtoupper($item->gender)}}</td>
                            <td>{{$item->phone}}</td>
                            <td>Active</td>
                            <td>
                                <a href="/members/edit/{{$item->id}}" class="btn btn-primary btn-sm bg-gradient-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                            <!-- </td>
                            <td> -->
                                <a href="/members/delete/{{$item->id}}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <a href="" class="btn btn-warning btn-sm">
                                    <i class="fa fa-lock"></i>
                                </a>

                                <a href="" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="" class="btn btn-dark btn-sm">
                                    <i class="fa fa-credit-card"></i>
                                </a>
                              

                            </td>
                        </tr>
                        @endforeach 

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection