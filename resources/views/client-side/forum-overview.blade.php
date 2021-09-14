@extends('layouts.app')
@section('content')

<div class="container">
    <nav class="breadcrumb">
      <a href="#" class="breadcrumb-item">Forum Categories</a>
      <a href="{{route('category.overview',$forum->category->id)}}" class="breadcrumb-item">{{$forum->category->title}}</a>
      <span class="breadcrumb-item active">{{$forum->title}}</span>
    </nav>

    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Category one -->
          <div class="col-lg-12">
            <!-- second section  -->
            <h4 class="text-white bg-info mb-0 p-4 rounded-top">
              {{$forum->title}}
            </h4>

            <table
              class="table table-striped table-responsivelg table-bordered"
            >
              <thead class="thead-light">
                <tr>
                  <th scope="col">Topic</th>
                  <th scope="col ">Created</th>
                  <th scope="col">Statistics</th>
                </tr>
              </thead>
              <tbody>
                @if(count($forum->topics))
                    @foreach ($forum->topics as $topic)
                    <tr>
                        <td>
                          <h3 class="h6">
                            <span class="badge badge-primary">{{count($topic->replies)}} Replies</span>
                            <a href="{{route('topic.overview',$topic->id)}}" class="">
                                {{$topic->title}}
                            </a
                            >
                          </h3>
                          <div class="small">
                            Go to page: <a href="#">1</a>, <a href="#">2</a>,
                            <a href="#">3</a>, <a href="#">4</a> &hellip;<a href="#"
                              >9</a
                            >,<a href="#">10</a>
                          </div>
                        </td>
                        <td>
                          <div>by <a href="#">{{$topic->user->name}}</a></div>
                          <div>{{$topic->created_at}}</div>
                        </td>
                        <td>
                          <div>{{count($topic->replies)}} replies</div>
                          <div>{{$topic->views}} views</div>
                        </td>
                      </tr>
                    @endforeach
                @else
                      <h1>No topics found!!</h1>
                @endif
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>















                {{-- <tr>
                  <td>
                    <h3 class="h6">
                      <span class="badge badge-primary">7 unread</span>
                      <a href="#" class=""
                        >Lorem ipsum, dolor sit amet consectetur
                        adipisicing.</a
                      >
                    </h3>
                    <div class="small">
                      Go to page: <a href="#">1</a>, <a href="#">2</a>,
                      <a href="#">3</a>, <a href="#">4</a> &hellip;<a href="#"
                        >9</a
                      >,<a href="#">10</a>
                    </div>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <span class="badge badge-primary">7 unread</span>
                      <a href="#" class=""
                        >Lorem ipsum, dolor sit amet consectetur
                        adipisicing.</a
                      >
                    </h3>
                    <div class="small">
                      Go to page: <a href="#">1</a>, <a href="#">2</a>,
                      <a href="#">3</a>, <a href="#">4</a> &hellip;<a href="#"
                        >9</a
                      >,<a href="#">10</a>
                    </div>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h3 class="h6">
                      <a href="#" class=""
                        >Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.</a
                      >
                    </h3>
                  </td>
                  <td>
                    <div>by <a href="#">Authorname</a></div>
                    <div>08.10.2021</div>
                  </td>
                  <td>
                    <div>5 replies</div>
                    <div>179 reviews</div>
                  </td>
                  <td>
                    <div><a href="#">Author name</a></div>
                    <div>06/07/ 2021 20:04</div>
                  </td>
                </tr> --}}


    <div class="mb-3 clearfix">
      <nav aria-label="Navigate post pages" class="float-lg-right">
        <ul class="pagination pagination-sm mb-lg-0">
          <li class="page-item active">
            <a href="#" class="page-link">1</a>
          </li>
          <li class="page-item"><a href="#" class="page-link">2</a></li>
          <li class="page-item"><a href="#" class="page-link">3</a></li>
          <li class="page-item"><a href="#" class="page-link">4</a></li>
          <li class="page-item"><a href="#" class="page-link">5</a></li>
          <li class="page-item">
            <a href="#" class="page-link">&hellip;</a>
          </li>
          <li class="page-item"><a href="#" class="page-link">9</a></li>
          <li class="page-item"><a href="#" class="page-link">10</a></li>
        </ul>
      </nav>
      <form action="" class="form-inline float-lg-left d-block d-sm-flex">
        <div class="mb-2 mb-sm-0 mr-2">Display posts from previous</div>
        <div class="form-group mr-2">
          <label class="sr-only" for="select-time"> Time Period</label>
          <select
            name="select-time"
            id=""
            class="form-control form-control-sm"
          >
            <option value="all">All posts</option>
            <option value="day">1 day</option>
            <option value="week">1 week</option>
            <option value="month">1 month</option>
            <option value="year">1 year</option>
          </select>
        </div>

        <div class="mb-2 mb-sm-0 mr-2">Sort by:</div>
        <div class="form-group mr-2">
          <label class="sr-only" for="post-sort">Sort posts by:</label>
          <select
            name="select-time"
            id=""
            class="form-control form-control-sm"
          >
            <option value="author">Author</option>
            <option value="post-time">Post time</option>
            <option value="replies">Replies</option>
            <option value="subject">Subject</option>
            <option value="views">Views</option>
          </select>
        </div>

        <div class="mb-2 mb-sm-0 mr-2">Sort direction:</div>
        <div class="form-group mr-2">
          <label class="sr-only" for="post-direct">Sort direct:</label>
          <select
            name="select-time"
            id=""
            class="form-control form-control-sm"
          >
            <option value="desending">Desending</option>
            <option value="ascending">Ascending</option>
          </select>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Sort</button>
      </form>
    </div>
    <a href="{{route('topic.new',$forum->id)}}" class="btn btn-lg btn-primary mb-2">New Topic</a>
  </div>

@endsection
