{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Item Details</h1>
@stop

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="card" style="width: 50rem; padding:20px;">

        <form action="{{route('updateItem',$item->id)}}" method="POST">
            @csrf
            {{-- @method('PUT') --}}
            <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" value="{{$item->item_name}}">
            </div>

            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <input type="text" class="form-control" id="supplier" name="supplier" value="{{$item->supplier}}">
            </div>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Quanity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$item->quantity}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text area" class="form-control" id="description" name="description" value="{{$item->description}}">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop