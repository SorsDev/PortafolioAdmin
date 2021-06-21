@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <h4 class="mr-2">Home Contacto </h4>
            <a href="{{route('add.contacto')}}"><button class="btn btn-info mb-2">Add Contacto</button></a>
            <br><br>

            <div class="col-md-12">
                <div class="card">

                	@if(session('success'))
                	<div class="alert alert-success alert-dismissible fade show" role="alert">
                		<strong>{{ session('success') }}</strong>
                		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                			<span aria-hidden="true">&times;</span>
                		</button>
                	</div>
                	@endif

                    <div class="card-header"> All About </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">SL</th>
                                <th scope="col" width="15%">Location</th>
                                <th scope="col" width="10%">Email</th>
                                <th scope="col" width="10%">Teléfono</th>
                                <th scope="col" width="10%">Created At</th>
                                <th scope="col" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @php($i = 1)
                            @foreach($contacts as $contacto)
                            <tr>
                                <th scope="row"> {{ $i++ }} </th>
                                <td> {{ $contacto->address }} </td>
                                <td> {{$contacto->email}} </td>
                                <td> {{$contacto->phone}} </td>
                                <td>
                                    @if($contacto->created_at == NULL)
                                    <span class="text-danger"> No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($contacto->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('contacto/edit/'.$contacto->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('contacto/delete/'.$contacto->id) }}"
                                        onclick="return confirm('Are you sure to delete')"
                                        class="btn btn-danger">Delete</a>
                                </td>


                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>




</div>
@endsection
