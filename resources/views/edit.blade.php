@extends('layout.main')
@section('main-section')


<div class="container mt-3">
    <div class="row">
        <div class="col col-md-8">

            <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(Session::has('success'))

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1"
                        value="{{$data->name}}">
                    <span class="alert text-danger">@error('name'){{$message}}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1"
                        value="{{$data->image}}">
                    <span class="alert text-danger">@error('image'){{$message}}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputPassword1"
                        value="{{$data->price}}">
                    <span class="alert text-danger">@error('price'){{$message}}@enderror</span>
                </div>


                <button type="submit" class="btn btn-primary">update</button>
                <a href="{{route('index')}}" class="btn btn-warning">show_data</a>
            </form>

        </div>
    </div>
</div>
@endsection()