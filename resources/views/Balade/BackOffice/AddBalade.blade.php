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

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Create Balade")}}</h5>
          </div>
          <div class="card-body">
            <!-- <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
            enctype="multipart/form-data">

              @csrf
              @method('put')
              @include('alerts.success')
              <div class="row">
              </div>


                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Title")}}</label>
                                <input type="text" name="title" class="form-control" >
                                @include('alerts.feedback', ['field' => 'title'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Title")}}</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
               

                
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
              <hr class="half-rule"/>
            </form> -->



            <form action="/balade/add" method="post" enctype="multipart/form-data">

                         @csrf
 
        				 <input type="text" name="titleBalade" class="form-control m-2" placeholder="Title Balade">
                         <Textarea name="descriptionBalade" cols="20" rows="4" class="form-control m-2" placeholder="Description Balade"></Textarea>
                         <input type="date" name="dateBalade" class="form-control m-2" placeholder="Date of Balade">

                         <input type="text" name="capaciteBalade" class="form-control m-2" placeholder="Capacite Balade">

                 <select name="MoyensBalade" class="form-control m-2">
                                <option >options</option>
                                <option value="Velo">Velo</option>
                                <option value="Trotinette">trottinette</option>
                                <option value="TrotinetteElectrique">Trotinette Electrique</option>


                               

                            </select>


        				 <!-- <input type="text" name="author" class="form-control m-2" placeholder="author"> -->

                         <input type="text" name="Destination" class="form-control m-2" placeholder="Destination">


                         <label class="m-2">Image</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="imageDescBalade">

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>



          </div>
      </div>
    </div>



      <!-- <div class="col-md-4">
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
      </div> -->

    </div>
  </div>
@endsection