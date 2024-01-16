@extends('layout.main')
@section('main-section')


<div class="container mt-3">
    <div class="row">
        <div class="col col-md-12">
            <a href="{{route('create')}}" class="btn btn-info mt-3 mb-3" style="width:90px; float:right;">Add</a>
            <!-- Add Filter -->
            <form action="{{route('filter')}}" method="GET">
                @csrf
                From:&nbsp;&nbsp;<input type="date" name="start_date">
                To:&nbsp;&nbsp;<input type="date" name="end_date">
                <button class="btn btn-warning text-white" style="width:90px; margin-left:10px; ">Filter</button>
            </form>

            <!-- End Filter_Code -->
            <table class="table  table-secondary table-striped text-center mt-1" id="example" class="display nowrap"
                style="width:100%" border="2">
                <!-- for flash_message -->

                @if(Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('fail')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- End Flash Message -->
                <thead>
                    <tr>
                        <th style="text-align:center;">Id</th>
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Created_at</th>
                        <th style="text-align:center;">Updated_at</th>
                        <th style="text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $datas=>$value)
                    <tr>
                        <td>{{$datas+1}}</td>
                        <td>{{$value->name}}</td>

                        <td>
                            @if ($value->image)
                            <img src="{{ asset('storage/' . $value->image) }}" alt="Product Image"
                                style="width:70px; border-radius:50%;">
                            @else
                            No Image
                            @endif
                        </td>

                        <td>{{$value->price}}</td>
                        <td>{{$value->created_at->format('Y-m-d')}}</td>
                        <td>{{$value->updated_at->format('Y-m-d')}}</td>
                        <td>
                            <a href="{{route('destroy',$value->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('edit',$value->id)}}" class="btn btn-info" style="width:80px;">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection()