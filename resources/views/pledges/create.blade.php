@extends('adminlte::page')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@section('content')
<div class="pt-3">
    <div>

        <div>
            <form class="md-float-material form-material" action="/pledges/create" method="POST">
                @csrf
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3">
                            <input id="amount" type="number" required class="form-control" name="amount"
                                placeholder="Amount">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3">
                            <input id="description" type="text" required class="form-control" name="description"
                                placeholder="Description">
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="col form-group-form-primary mb-3">
                            <label for="livesearch" class="text-secondary">User</label>
                            <div class="col">
                                <select class="livesearch form-control p-3" name="livesearch" id="livesearch"></select>

                                <script type="text/javascript">
                                    $('.livesearch').select2({
                                            placeholder: 'Select User',
                                            ajax: {
                                                url: '/members/search',
                                                dataType: 'json',
                                                delay: 250,
                                                processResults: function (data) {
                                                    return {
                                                        results: $.map(data, function (item) {
                                                            return {
                                                                text: item.first_name + ' ' + item.second_name + ' ' + item.last_name,
                                                                id: item.id
                                                            }
                                                        })
                                                    };
                                                },
                                                cache: true
                                            }
                                        });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col form-group-form-primary mb-3">
                            <label for="purpose_id" class="text-secondary">Purpose</label>
                            <div class="col ">
                                <select name="purpose_id" id="purpose_id" class="form-control bg-gradient-light">
                                    @foreach ($purposes as $purpose)
                                    <option value="{{ $purpose->id }}"> {{ $purpose->title }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col form-group-form-primary mb-3">
                            <label for="purpose_id" class="text-secondary">Pledge Type</label>
                            <div class="col ">
                                <select name="pledge_type_id" id="pledge_type_id" class="form-control bg-gradient-light">
                                    @foreach ($pledge_types as $pledge_type)
                                    <option value="{{ $pledge_type->id }}"> {{ $pledge_type->title }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="deadline" class="text-secondary">Deadline</label>

                        <div class="form-group form-primary mb-3">
                            <input id="deadline" type="date" required class="form-control" name="deadline"
                                placeholder="">
                        </div>
                    </div>


                </div>


                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-block text-decoration-none text-light bg-gradient-success col-lg-6">
                        <!-- <button type="button" type="submit" class="btn btn-primary btn-block  "> -->
                        <i class="fas fa-save"></i>
                        Create Pledge

                        <!-- </button> -->
                    </button>
                </div>


            </form>
        </div>

    </div>
</div>
@endsection