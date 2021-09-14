@extends('layouts.dashboard')

@section('content')
          <!--main content start-->

          @if ($user)

    <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-users"></i>Users</li>
              <li><i class="fa fa-user-md"></i>{{$user->name}}</li>
              </ol>
            </div>
          </div>

        <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('images/profile.png')}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{$user->email}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Topic count: </b> <a class="float-right">{{count($user->topics)}}</a>
                                </li>
                                {{-- <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li> --}}
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                {{$user->education}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{$user->country}}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                {{$user->skills}}
                                {{-- <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span> --}}
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i>Bio</strong>

                            <p class="text-muted">{{$user->bio}}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->






                <div class="col-md-9">






                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">









                                @if($latest_user_post)
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('images/profile.png')}}" width="70" height="70" alt="user image">
                                        <span class="username">
                                            {{-- <a href="#">{{$user->name}}</a> --}}
                                            <a href="#">{{$user->name}}</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Started a discussion - {{$latest_user_post->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!-- /.user-block -->

                                    <p>
                                        {{$latest_user_post->desc}}
                                    </p>

                                    <p>
                                        <a href="" class="link-black text-sm mr-2"><i class="fa fa-eye mr-1"></i>{{$latest_user_post->views}} Viewed</a>
                                        <a href="" class="link-black text-sm"><i class="fas fa-reply mr-1"></i> {{$latest_user_post->replies->count()}} Replies</a>
                                        <span class="float-right">
                                            @if ($latest_user_post->replies->count()>0)
                                            @if (auth()->user() && auth()->user()->is_admin)
                                                <a href="{{route('topic.delete',$latest_user_post->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                            @endif
                                            @else
                                            <a href="{{route('topic.delete',$latest_user_post->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            @endif
                                        </span>
                                    </p>
                                </div>

                                @else
                                    <p>
                                        You have not started any discussions yet.
                                    </p>
                                    @endif
                                <!-- /.post -->
                                <br />
                                <hr />
                                <br />




                            </div>










                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">


                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">


                                <form class="form-horizontal" action="{{route('user.update',auth()->id())}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{$user->name}}" id="inputName" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" value="{{$user->email}}" id="inputEmail" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{$user->phone}}" id="inputName2" name="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" name="education" value="{{$user->education}}" placeholder="Describe your education background"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="skills" value="{{$user->skills}}" id="inputSkills" placeholder="Separated by comma">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Profession</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="profession" value="{{$user->profession}}" id="inputSkills" placeholder="Profession">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" name="address" value="{{$user->address}}" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="country" id="inputSkills" value="{{$user->country}}" placeholder="Enter a country">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Bio</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" name="bio" value="{{$user->bio}}" placeholder="Enter brief Introduction"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Update details</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


          <!-- page end-->
        </section>
      </section>
      <!--main content end-->
      @endif
@endsection
