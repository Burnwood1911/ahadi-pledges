@extends('adminlte::page')


@section('content')
<div class="pt-3">
    <div>

        <div>
            <form class="md-float-material form-material" action="/pledges/update/{{ $pledge->id }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3">
                            <input id="amount" type="number" value="{{ $pledge->amount }}" required class="form-control" name="amount"
                                placeholder="Amount">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3">
                            <input id="description" type="text" value="{{ $pledge->description }}" required class="form-control" name="description"
                                placeholder="Description">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col form-group-form-primary">
                            <label for="purpose_id" class="text-secondary">Purpose</label>
                            <div class="col ">
                                <select name="purpose_id" id="purpose_id" class="form-control bg-gradient-light">
                                    @foreach ($purposes as $purpose)
                                    <option value="{{ $purpose->id }}" {{ $pledge->purpose->id == $purpose->id ? 'selected' : '' }}> {{ $purpose->title }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col form-group-form-primary">
                            <label for="purpose_id" class="text-secondary">Pledge Type</label>
                            <div class="col ">
                                <select name="pledge_type_id" id="pledge_type_id" class="form-control bg-gradient-light">
                                    @foreach ($pledge_types as $pledge_type)
                
                                    <option value="{{ $pledge_type->id }}" {{ $pledge->pledge_type_id == $pledge_type->id ? 'selected' : '' }}> {{ $pledge_type->title }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="deadline" class="text-secondary">Deadline</label>

                        <div class="form-group form-primary mb-3">
                            <input id="deadline" value="{{ $pledge->deadline}}" type="date" required class="form-control" name="deadline"
                                placeholder="">
                        </div>
                    </div>


                </div>


                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-block text-decoration-none text-light bg-gradient-success col-lg-6">
                        <!-- <button type="button" type="submit" class="btn btn-primary btn-block  "> -->
                        <i class="fas fa-save"></i>
                        Save Pledge

                        <!-- </button> -->
                    </button>
                </div>


            </form>
        </div>

    </div>
</div>
@endsection