@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Balade',
    'activePage' => 'balade',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-8">


        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Edit Balade")}}</h5>
          </div>
          <div class="card-body">
        


             <form action="/balade/update/{{ $balades->id }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method("put")



                            
        				 <input type="text" name="titleBalade" class="form-control m-2" placeholder="Title Balade" value="{{ $balades->titleBalade }}">
                         <input name="descriptionBalade" cols="20" rows="4" class="form-control m-2" placeholder="Description Balade" value="{{ $balades->descriptionBalade }}"></input>
                         <input type="date" name="dateBalade" class="form-control m-2" placeholder="Date of Balade" value="{{ $balades->dateBalade }}">

                         <input type="text" name="capaciteBalade" class="form-control m-2" placeholder="Capacite Balade" value="{{ $balades->capaciteBalade }}">

                         <select name="MoyensBalade" class="form-control m-2">
                                <option >options</option>
                                <option value="Velo">Velo</option>
                                <option value="Trotinette">trottinette</option>
                                <option value="TrotinetteElectrique">Trotinette Electrique</option>
                             
                          </select>
        				 <!-- <input type="text" name="author" class="form-control m-2" placeholder="author"> -->

                         <input type="text" name="Destination" class="form-control m-2" placeholder="Destination" value="{{ $balades->Destination }}">
                         <input type="text" name="ParticipanrBalade" class="form-control m-2" placeholder="Participant Balade" value="{{ $balades->ParticipanrBalade }}">

                         <label class="m-2">Image</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="imageDescBalade">

                     
                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>



          </div>
      </div>
    </div>



      <div class="col-md-4">
        <div class="card card-user">
          <div class="image">
            <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                <h5 class="title">{{ auth()->user()->name }}</h5>
              </a>
              <p class="description">
                  {{ auth()->user()->email }}
              </p>
            </div>
          </div>
          <hr>
          <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-facebook-square"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
              <i class="fab fa-google-plus-square"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection