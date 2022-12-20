@extends('adminlte::page')


@section('content')



<div class="pt-4">
       
        <div>
            <form class="md-float-material form-material" action="/members/update/{{$data->id}}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3">
                            <input  type="text" value="{{$data->first_name}}" id="first_name" class="form-control" name="first_name"  placeholder="First Name" > 
                       </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3">
                            <input  type="text" value="{{$data->second_name}}" id="second_name" class="form-control" name="second_name"  placeholder="Middle Name" > 
                       </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3"> 
                            <input id="lastname" type="text" value="{{$data->last_name}}" class="form-control" name="last_name"  placeholder="Last Name" > 
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-primary mb-3 "> 
                            <div class="input-group-prepend">
                              
                                <input  id="phone" value="{{$data->phone}}"  type="text" class="form-control" name="phone" placeholder="Phone Number" >
                            </div> 
                          </div>
                    
                    </div>

                    <div class="col-lg-6">
                        <div class="row mb-3">
                            <div class="col form-group-form-primary"> 
                              <label for="card_no" class="text-secondary">Community (Jumuiya)</label>
                             <select name="jumuiya_id" id="jumuiya_id" class="form-control bg-gradient-light">
                                @foreach($jumuiyas as $jumuiya)
                                  <option value="{{$jumuiya->id}}" {{ ($data->jumuiya->id == $jumuiya->id)? "selected" : ""}}> {{ $jumuiya->name}} </option>
                               @endforeach
                              </select>
                              </div>
                            </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col form-group-form-primary">
                            <label for="card_no" class="text-secondary">Member Card No</label>
                            <div class="col ">
                              <select name="card_no" class="form-control bg-gradient-light">
                                  <@foreach($cards as $card)
        
                                  <option value="{{$card->id}}"> {{ $card->card_no}} </option>
                                  
                               @endforeach
                              
                              </select>
                           </div>
                          </div>
                    </div>
                  
                    <div class="col-lg-6">
                        <label for="card_no" class="text-secondary">Birthdate</label>
                        <div class="form-group form-primary mb-3"> 
                            <input value="{{$data->date_of_birth}}" id="date_of_birth" type="date" class="form-control" name="date_of_birth" placeholder="" > </div>
                    </div>

                <div class="col-lg-6">
                    <label for="card_no" class="text-secondary">Gender</label>
                    <div class="row mx-1 ">
                        
                      <div class="col-lg-6 form-check form-check-inline"><input type="radio" id="male" {{ ($data->gender=="male")? "checked" : "" }} name="gender" value="male" class="form-check-input">
                        <label class="form-check-label" for="male" >Male</label>
                        &nbsp;
                      <div class="col-lg-6 form-check form-check-inline"><input type="radio" id="female" {{ ($data->gender=="femail")? "checked" : "" }}  name="gender" value="female" class="form-check-input">
                        <label class="form-check-label" for="female">Female</label></div>
                    </div>
                
                </div>
                     
            
                </div>

                <div class="col-lg-6">
                    <div class="form-group form-primary mb-3"> 
                        <input id="email" value="{{$data->email}}" type="text" class="form-control" name="email"  placeholder="Email" > 
                    </div>
                </div>
              
                <div class="col-lg-6">
                    <div class="form-group form-primary mb-3"> <input id="password" type="password" class="form-control" value="{{$data->password}}" name="password" placeholder="Password" > </div>
                </div>
                


             </div>
             
               
             <div class="modal-footer">
                <button type="submit" class=" btn btn-block text-decoration-none text-light bg-gradient-success col-lg-6">
              <!-- <button type="button" type="submit" class="btn btn-primary btn-block  "> -->
                <i class="fas fa-save"></i>
                    Update Member
                   
            <!-- </button> -->
                </button>
        </div>
             
         
    </form>
        </div>
        



@endsection