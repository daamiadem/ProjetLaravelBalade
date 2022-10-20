@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Evenement',
    'activePage' => 'evenement',
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
              <a class="btn btn-primary btn-round text-white pull-right" href="{{url('evenement/create')}}">Add Evenement</a>
            <h4 class="card-title">Evenements</h4>
          </div> 

          <div class="card-body">

            <div class="toolbar">

            </div>
            

            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Capacite</th>
                  <th>Image</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Capacite</th>
                  <th>Image</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </tfoot>
              <tbody>

              
              @foreach ($evenements as $evenement)


                <tr>

                    <td>{{ $evenement->title }}</td>

                    <td>{{ $evenement->description }}</td>

                    <td>{{ $evenement->date }}</td>

                    <td>{{ $evenement->capacite }}</td>

                    <td>
                   

            <span class="avatar avatar-sm rounded-circle">
                        <img src="/cover/{{ $evenement->image }}" alt="" style="max-width: 80px; border-radiu: 100px">
                      </span>


                    </td>

                    <td class="text-right">
                      
                      <!-- <a type="button" href="#" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a> -->

                    <a href="/evenement/edit/{{ $evenement->id }}" class="btn btn-outline-primary">Update</a>
<br/>
                    <form action="delete/{{ $evenement->id }}" method="POST">

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