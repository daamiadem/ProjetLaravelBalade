@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'participants',
    'activePage' => 'participants',
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
              <a class="btn btn-primary btn-round text-white pull-right" href="{{url('participant/create')}}">Add participant</a>
            <h4 class="card-title">Participants</h4>
          </div> 

          <div class="card-body">

            <div class="toolbar">

            </div>
            

            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>image </th>
                  <th>Nom </th>
                  <th>Prenom </th>
                  <th>Mail </th>
                  <th>Etat Physique</th>                  
                  <th>num </th>
                  <th>Age </th>
                  <th>Balade </th>
                  
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
                
                      <tfoot>
                <tr>
                <th>image </th>
                  <th>Nom </th>
                  <th>Prenom </th>
                  <th>Mail </th>
                  <th>Etat Physique</th>                  
                  <th>num </th>
                  <th>Age </th>
                  <th>Balade </th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </tfoot>
              <tbody>

              
              @foreach ($participants as $participants)


                <tr>

                <td>
                   

                   <span class="avatar avatar-sm rounded-circle">
                               <img src="/coverParticipant/{{ $participants->imageParticipant }}" alt="" style="max-width: 80px; border-radiu: 100px">
                             </span>
       
       
                           </td>
                    <td>{{ $participants->NomParticipant }}</td>

                    <td>{{ $participants->PrenomParticipant }}</td>

                    <td>{{ $participants->MailParticipant }}</td>

                    <td>{{ $participants->EtatPhysique }}</td>

                    <td>{{ $participants->numParticipant }}</td>

                    <td>{{ $participants->AgeParticipant }}</td>

                    <td>{{ $participants->balade->titleBalade }}</td>


                
                    

                    

                    <td class="text-right">
                      
                      <!-- <a type="button" href="#" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a> -->

                    <a href="/participant/edit/{{ $participants->id }}" class="btn btn-outline-primary">Update</a>
<br/>
                    <form action="delete/{{ $participants->id }}" method="POST">

                            @csrf
                            @method('delete')
                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete </button>
                           
                        </form>
                    </td>


                </tr>
                  @endforeach

                              </tbody>

            </table>
            
          </div>




          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
  
  </div>
@endsection