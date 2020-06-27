@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                                <a class="navbar-brand "  href="{{ url('/') }}" >
                                    <div class="col-md-1 text-white float-left hov">
                                        <i class="fa fa-angle-left" style="font-size: 25px" aria-hidden="true"></i>
                                    </div>
                                </a>


                            <div class="col-md-10 text-white float-right">  <h5><center>{{ $theme->name }}</br>
{{--                                        @foreach($statuses as $status)--}}
{{--                                        {{$theme->status->name}}--}}
{{--                                        @endforeach--}}
                                    </center>
                                </h5>
                            </div>
                            <div class="col-md-1 text-white float-right"><a href="#" role="button" class="btn btn-md btn-outline-light"
                                                        data-toggle="modal"
                                                        data-target="#modal_02"
                                                        data-content="">
                                    <i class="fa fa-cog fa-fw"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div id="tag_container">
                            @include('messages')
                        </div>
                        <hr>
                        <form class="form-horizontal" id="addMessage">
                            @csrf
                            @if (($theme->status==2 && ($theme->owner_id==auth()->user()->id || (Auth::user()->is_admin == 1))) || $theme->status==1 || $theme->status==3)
                            <textarea onfocus="" rows="1" class="form-control mb-3" type="text" id="message" name="message"
                                      required></textarea>

                            <input type="hidden" id="theme_id" name="theme_id" value={{ $theme->id }} >


                            <button  type="submit" id="btnAddMessage" class="btn btn-md btn-my mb-3 float-right"
                            role="button"><i class="fa fa-paper-plane fa-fw"
                                             aria-hidden="true"></i> Ответить
                            </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @include('modal.newTheme')--}}
@endsection
