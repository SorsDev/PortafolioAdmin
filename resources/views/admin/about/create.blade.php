@extends('admin.admin_master')

@section('admin')
<div class="col-lg-10">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create About</h2>
        </div>
        <div class="card-body">
            <form action=" {{route('store.about')}} " method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">About Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="short_disc">About Description corta</label>
                    <textarea class="form-control" name="short_disc" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="long_disc">About Description Larga</label>
                    <textarea class="form-control" name="long_disc" rows="3"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
