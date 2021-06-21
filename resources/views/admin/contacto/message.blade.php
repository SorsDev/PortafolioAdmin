@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <h4 class="mr-2">Home Message </h4>
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

                    <div class="card-header"> All message </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">SL</th>
                                <th scope="col" width="15%">name</th>
                                <th scope="col" width="10%">Email</th>
                                <th scope="col" width="10%">Subject</th>
                                <th scope="col" width="10%">Message</th>
                                <th scope="col" width="10%">Created At</th>
                                <th scope="col" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @php($i = 1)
                            @foreach($messages as $message)
                            <tr>
                                <th scope="row"> {{ $i++ }} </th>
                                <td> {{ $message->name }} </td>
                                <td> {{ $message->email }} </td>
                                <td> {{ $message->subject }} </td>
                                <td> {{ $message->message }} </td>
                                <td>
                                    @if($message->created_at == NULL)
                                    <span class="text-danger"> No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('message/delete/'.$message->id) }}"
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
