@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Главная</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

{{--                        <img src="{{Storage::url(Auth::user()->avatar) }}" alt="" width="50px" height="50px">  {{ Auth::user()->name }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
