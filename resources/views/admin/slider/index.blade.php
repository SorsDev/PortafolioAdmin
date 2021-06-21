@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <h4 class="mr-2">Home SLider </h4>
            <a href="{{route('add.slider')}}"><button class="btn btn-info mb-2">Add Slider</button></a>
            <br><br>

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header"> All Slider </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">SL</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="35%">Description</th>
                                <th scope="col" width="10%">Image</th>
                                <th scope="col" width="5%">Created At</th>
                                <th scope="col" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @php($i = 1)
                            @foreach($sliders as $slider)
                            <tr>
                                <th scope="row"> {{ $i++ }} </th>
                                <td> {{ $slider->title }} </td>
                                <td> {{$slider->description}} </td>
                                <td> <img src="{{ asset($slider->image) }}" style="height:40px; width:70px;"> </td>
                                <td>
                                    @if($slider->created_at == NULL)
                                    <span class="text-danger"> No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('slider/delete/'.$slider->id) }}"
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
