@extends('layouts.app')

@section('content')
<div class="top-post-area">
    <div class="container">
        <div class="row">
            <div class="col-24">
                <div class="section-tittle mb-35">
                    <h2>Balades</h2>
                    <div class="list-group-horizontal" style="width: 400px; margin: auto">
                        <form method="GET" action="{{ route('balade_search') }}">
                            {{csrf_field()}}
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item">
                                    <input type="text" name="search" id="input" class="form-control col-20" placeholder="search Balades"
                                           aria-label="Search" style="float: left; height: 50px"/></li>
                                <li class="list-group-item"> <button  type="submit" class="button rounded-0 primary-bg text-black w-100 btn_1 boxed-btn col-20" style="height: 50px">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </li>
                            </ul>
                        </form>
                    </div>


                    {{--Tri--}}
                    <div class="list-group-horizontal" style="width: 400px; margin: auto">
                        <form method="GET" action="{{ route('balade_tri') }}">
                            {{csrf_field()}}
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item text-center">Trier Par</li>
                                <li class="list-group-item">
                                    <select id="select" name="tri" class="form-control form-control-lg">
                                        <option value="ALL" selected>All</option>
                                        <option value="NAME">name</option>
                                        <option value="DATE">date</option>
                                        <option value="HARD">HARD</option>
                                        <option value="MEDIUM">MEDIUM</option>
                                        <option value="EASY">EASY</option>
                                    </select>
                                </li>
                                <li class="list-group-item"> <button  type="submit" class="button rounded-0 primary-bg text-black w-100 btn_1 boxed-btn col-20" style="height: 50px">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </li>
                            </ul>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class=" container-fluid col-12">
            <div class="col-lg-12 col-md-12 container-fluid  d-flex flex-wrap">
                <!-- single-event-content -->
                @foreach($balades as $balade)
                <div class="single-job-items mb-30 col-6">
                    <div class="job-items m-5">
                        <div class="company-img">
                            @if (count($balade->images) > 0)
                                <img src="{{url('/uploads/balade/'. $balade->images[0]->image) }}" alt="Image" style="width: 260px; height: 240px"/>
                            @endif
                        </div>
                        <div class="job-tittle">
                            <a href="{{ route('balade.show', $balade->id) }}"><h4>{{ $balade->name }}</h4></a>
                            <h4 style="color: red">{{$balade->max_participants -  count($balade->users)}} places left !</h4>
                            <h4>{{ date('d-m-Y', strtotime($balade->date)) }}</h4>
                            <p>{{ $balade->description }}</p>
                            <p>{{ $balade->difficulty }}</p>

                            @if ($balade->max_participants -  count($balade->users) > 0)
                                <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn">Participate</button>
                            @endif
                            <form action="{{ route('balade.destroy', $balade->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn">Delete</button>
                            </form>
                            <button type="submit" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn"><a href="{{ route('balade.edit', $balade->id) }}">Edit</a></button>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row-cols-12 max-width-50px">
    {!! $balades->appends(\Request::except('page'))->render() !!}
</div>


<h1><a href="{{ route('balade.create') }}">Create Balade</a></h1>

@endsection


