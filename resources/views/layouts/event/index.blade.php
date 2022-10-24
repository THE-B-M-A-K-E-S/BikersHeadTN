{{--<html lang="">--}}

{{--<h1>All Events</h1>--}}
{{--<table>--}}
{{--    <thead>--}}
{{--        <tr>--}}
{{--            <th>Id</th>--}}
{{--            <th>title</th>--}}
{{--            <th>description</th>--}}
{{--            <th>date</th>--}}
{{--            <th>location</th>--}}
{{--            <th>type</th>--}}
{{--            <th>actions</th>--}}
{{--        </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--        @foreach($events as $event)--}}
{{--        <tr>--}}
{{--            <td>{{ $event->id }}</td>--}}
{{--            <td>{{ $event->title }}</td>--}}
{{--            <td>{{ $event->description }}</td>--}}
{{--            <td>{{ date('d-m-Y', strtotime($event->date)) }}</td>--}}
{{--            <td>{{ $event->location }}</td>--}}
{{--            <td>{{ $event->eventType->type }}</td>--}}
{{--            <td>--}}
{{--                <a --}}{{--href="{{ route('balade.show', $balade->id) }}"--}}{{-->Show</a>--}}
{{--                <a --}}{{--href="{{ route('balade.edit', $balade->id) }}"--}}{{-->Edit</a>--}}
{{--                <form --}}{{--action="{{ route('balade.destroy', $balade->id) }}"--}}{{-- method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">Delete</button>--}}
{{--                </form>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--</html>--}}


@extends('layouts.app')

@section('content')
    <div class="top-post-area">
        <div class="container">
            <h3><a href="{{ route('event.create') }}">Create Event</a></h3>

            <div class="row">
                <div class="col-24">
                    <div class="section-tittle mb-35">
                        <h2>All events</h2>
                        <div class="list-group-horizontal" style="width: 400px; margin: auto">
                            <form method="post" {{--action="{{ path('event_search') }}"--}}>
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item">
                                        <input type="text" name="search" id="input" class="form-control col-20" placeholder="search Events"
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
                            <form method="post" {{--action="{{ path('event_tri') }}"--}}>
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item text-center">Trier Par</li>
                                    <li class="list-group-item">
                                        <select id="select" name="tri" class="form-control form-control-lg">
                                            <option selected>id</option>
                                            <option value="name">name</option>
                                            <option>date</option>
                                            <option>HARD</option>
                                            <option>MEDIUM</option>
                                            <option>EASY</option>
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
                    @foreach($events as $event)
                        <div class="single-job-items mb-30 col-6">
                            <div class="job-items m-5">
                                <div class="company-img">
                                    <img src="{{url($event->images) }}" alt="Image" style="width: 260px; height: 240px"/>
                                </div>
                                <div class="job-tittle">
                                    <a href="{{ route('event.show', $event->id) }}"><h4>{{ $event->title }}</h4></a>
                                    <h4>{{ date('d-m-Y', strtotime($event->date)) }}</h4>
                                    <p>{{ $event->description }}</p>
                                    <button type="button" class="button rounded-0 primary-bg w-100 btn_1 boxed-btn">Participate</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection


