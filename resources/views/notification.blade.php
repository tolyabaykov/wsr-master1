@extends('layouts.app')
@section('content')
    <div class="container-fluid">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9 text-white"><h5><i class="fa fa-calendar fa-fw"
                                                                            aria-hidden="true"></i>&nbsp;

                                        </h5></div>

                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row justify-content-center ">
                                    <div class="col-md-12">
                                        @foreach(auth()->user()->notifications as $notification)

                                            {{$notification->data['warning']}}

                                        @endforeach

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection
