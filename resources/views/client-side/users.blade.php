@extends('layouts.app')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            @if(count($users)>0)
            @foreach ($users as $user)
            <div class="col-lg-4 mb-5">
                <div class="card p-2 mt-3">
                    <div class="first">
                        <h6 class="heading">{{$user->profession}}</h6>
                        <div class="time d-flex flex-row align-items-center justify-content-between mt-3">
                            <div class="d-flex align-items-center"> <i class="fa fa-clock-o clock"></i> <span class="hour ml-1">Joined : {{$user->created_at->diffForHumans()}}</span> </div>
                            <div> <span class="font-weight-bold">Rank : {{$user->rank}}</span> </div>
                        </div>
                    </div>
                    <div class="second d-flex flex-row mt-2">
                        @if ($user->image)
                        <div class="image mr-3"> <img src="{{asset('/storage/profiles/'.$user->image)}}" class="rounded-circle" width="60" /> </div>
                        @else
                        <div class="image mr-3"> <img src="{{asset('/storage/profiles/default.png')}}" class="rounded-circle" width="60" /> </div>
                        @endif
                        <div class="">
                            <div class="d-flex flex-row mb-1"> <span>{{$user->name}}</span>
                                {{-- <div class="ratings ml-2"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> --}}
                            </div>
                            <div>
                                @if($user->country)
                                    <button class="btn btn-outline-dark btn-sm px-2">{{$user->country}}</button>
                                @else
                                    <button class="btn btn-outline-dark btn-sm px-2">Not Updated</button>
                                @endif
                                    <a href="{{route('client.user.profile',$user->id)}}" class="btn btn-outline-dark btn-sm">See Profile</a> </div>
                        </div>
                    </div>
                    <hr class="line-color">
                    <h6>{{count($user->topics)}} Posts</h6>

                </div>
            </div>
            @endforeach
            @else
                <h1>No members</h1>
            @endif

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
