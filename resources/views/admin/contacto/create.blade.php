@extends('admin.admin_master')

@section('admin')
<div class="col-lg-10">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contacto</h2>
        </div>
        <div class="card-body">
            <form action=" {{route('store.contacto')}} " method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Ubicación</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Ubicación">
                </div>
                <div class="form-group">
                    <label for="title">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="title">Teléfono</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Teléfono">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
