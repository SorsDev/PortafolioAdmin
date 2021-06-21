@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <h4 class="mr-2">Home About </h4>
            <a href="{{route('add.about')}}"><button class="btn btn-info mb-2">Add About</button></a>
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
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="10%">Description corta</th>
                                <th scope="col" width="20%">Description larga</th>
                                <th scope="col" width="5%">Created At</th>
                                <th scope="col" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @php($i = 1)
                            @foreach($homeabout as $about)
                            <tr>
                                <th scope="row"> {{ $i++ }} </th>
                                <td> {{ $about->title }} </td>
                                <td> {{$about->short_disc}} </td>
                                <td> {{$about->long_disc}} </td>
                                <td>
                                    @if($about->created_at == NULL)
                                    <span class="text-danger"> No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($about->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('about/delete/'.$about->id) }}"
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
