@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'balades',
    'activePage' => 'balades',
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
              <a class="btn btn-primary btn-round text-white pull-right" href="{{url('balade/create')}}">Add balade</a>
            <h4 class="card-title">balades</h4>
          </div> 

          <div class="card-body">

            <div class="toolbar">

            </div>
            

            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>image</th>
                  <th>title</th>
                  <th>Description</th>
                  <th>date</th>
                  <th>capacite</th>                  
                  <th>Moyens</th>
                  <th>Destination</th>
                  <th>Participant</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
                
                      <tfoot>
                <tr>
                <th>image</th>
                  <th>title</th>
                  <th>Description</th>
                  <th>date</th>
                  <th>capacite</th>                  
                  <th>Moyens</th>
                  <th>Destination</th>
                  <th>Participant</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </tfoot>
              <tbody>

              
              @foreach ($balades as $balades)


                <tr>

                <td>
                   

                   <span class="avatar avatar-sm rounded-circle">
                               <img src="/coverBalade/{{ $balades->imageDescBalade }}" alt="" style="max-width: 80px; border-radiu: 100px">
                             </span>
       
       
                           </td>
                    <td>{{ $balades->titleBalade }}</td>

                    <td>{{ $balades->descriptionBalade }}</td>

                    <td>{{ $balades->dateBalade }}</td>

                    <td>{{ $balades->capaciteBalade }}</td>
                    <td>{{ $balades->MoyensBalade }}</td>

                    <td>{{ $balades->Destination }}</td>


                    <td>{{ $balades->ParticipanrBalade }}</td>
                    

                    

                    <td class="text-right">
                      
                      <!-- <a type="button" href="#" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a> -->

                    <a href="/balade/edit/{{ $balades->id }}" class="btn btn-outline-primary">Update</a>
<br/>
                    <form action="delete/{{ $balades->id }}" method="POST">

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