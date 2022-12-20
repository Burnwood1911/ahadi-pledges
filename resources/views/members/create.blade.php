@extends('adminlte::page')


@section('content')

    <div class="pt-3">
      <div>
    
        <div>
            <form class="md-float-material form-material" action="/members/create" method="POST">
                 @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group form-primary mb-3">
                                    <input id="first_name"  type="text" required class="form-control" name="first_name"  placeholder="First Name" > 
                               </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-primary mb-3">
                                    <input id="second_name" type="text" required class="form-control" name="second_name"  placeholder="Middle Name" > 
                               </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group form-primary mb-3"> 
                                    <input id="last_name" type="text" required class="form-control" name="last_name"  placeholder="Last Name" > 
                                </div>
                            </div>

                            
                        
                            <div class="col-lg-6">
                                <div class="form-group form-primary mb-3 "> 
                                    <div class="input-group-prepend">
                                        <input  id="phone" required type="text" class="form-control" name="phone" placeholder="Phone Number" >
                                    </div> 
                                  </div>
                            
                            </div>

                            

                            <div class="col-lg-6">
                                <div class="row mb-3">
                                    <div class="col form-group-form-primary"> 
                                      <label for="card_no" class="text-secondary">Community (Jumuiya)</label>
                                     <select name="jumuiya_id" id="jumuiya_id" class="form-control bg-gradient-light">
                                        @foreach($jumuiyas as $jumuiya)
        
                                          <option value="{{$jumuiya->id}}"> {{ $jumuiya->name}} </option>
                                          
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
                                          @foreach($cards as $card)
        
                                          <option value="{{$card->id}}"> {{ $card->card_no}} </option>
                                          
                                       @endforeach
                                      
                                      </select>
                                   </div>
                                  </div>
                            </div>
                          
                            <div class="col-lg-6">
                                <label for="card_no" class="text-secondary">Birthdate</label>
                                <div class="form-group form-primary mb-3"> 
                                    <input id="date_of_birth" type="date" class="form-control" required name="date_of_birth" placeholder="" > </div>
                            </div>

                        <div class="col-lg-6">
                            <label for="card_no" class="text-secondary">Gender</label>
                            <div class="row mx-1 ">
                                
                              <div class="col-lg-6 form-check form-check-inline"><input type="radio" id="male"   name="gender" value="male" class="form-check-input">
                                <label class="form-check-label" for="male" >Male</label>
                                &nbsp;
                              <div class="col-lg-6 form-check form-check-inline"><input type="radio" id="female"  name="gender" value="female" class="form-check-input">
                                <label class="form-check-label" for="female">Female</label></div>
                            </div>
                        
                        </div>
                             
                      
                        
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group form-primary mb-3"> 
                                <input id="email" type="email" required class="form-control" name="email"  placeholder="Email" > 
                            </div>
                        </div>
                      
                        <div class="col-lg-6">
                            <div class="form-group form-primary mb-3"> <input id="password" type="password" required class="form-control" name="password" placeholder="Password" > </div>
                        </div>
                    


                     </div>
                     
                       
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-block text-decoration-none text-light bg-gradient-success col-lg-6">
                      <!-- <button type="button" type="submit" class="btn btn-primary btn-block  "> -->
                        <i class="fas fa-save"></i>
                            Save Member
                           
                    <!-- </button> -->
                        </button>
                    </div>
                     
                 
            </form>
        </div>
        
      </div>
    </div>
  


@endsection