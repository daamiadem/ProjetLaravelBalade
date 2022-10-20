@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Participant',
    'activePage' => 'participant',
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
            <h5 class="title">{{__(" Edit Participant")}}</h5>
          </div>
          <div class="card-body">
        


             <form action="/participant/update/{{ $participants->id }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method("put")


                         <input type="text" name="NomParticipant" class="form-control m-2" placeholder="Nom Particitpant" value="{{ $participants->NomParticipant }}">
                         <input type="text" name="PrenomParticipant" cols="20" rows="4" class="form-control m-2" placeholder="Prenom Particitpant Balade" value="{{ $participants->PrenomParticipant }}" ></input>
                         <input type="text" name="MailParticipant" class="form-control m-2" placeholder="Mail Particitpant" value="{{ $participants->MailParticipant }}">

                         <select name="EtatPhysique" class="form-control m-2">
                                <option >options</option>
                                <option value="Bonne">Bonne</option>
                                <option value="Moyenne">Moyenne</option>
                                <option value="Mauvaise">Mauvaise</option>                             

                            </select>
        				 <!-- <input type="text" name="author" class="form-control m-2" placeholder="author"> -->

                         <input type="text" name="numParticipant" class="form-control m-2" placeholder="Num Particitpant" value="{{ $participants->numParticipant }}">
                         <input type="text" name="AgeParticipant" class="form-control m-2" placeholder="Age Participant" value="{{ $participants->AgeParticipant }}">
                         <div class="mb-3">
                            <label> Choose Balade</label>
                            <select name="balade_id" class="form-control">
                                @foreach ($balades as $item)
                                <option value="{{ $item->id}}">{{ $item->titleBalade}}</option>
                                @endforeach

                            </select>
                        </div>

                         <label class="m-2">Image</label>
                         <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="imageParticipant">


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