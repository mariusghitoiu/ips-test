@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p>

                    <hr>

                    <p>Started modules:</p>

                    <p>
                        <ul>
                            @foreach(auth()->user()->userProgress as $module)
                                <li>
                                    <h3>{{ strtoupper($module->course_key) }} -> {{ $module->name }}</h3>
                                    <h4>Started at: {{ $module->pivot->started_at }}</h4>
                                    <h4>Ended at: {{ $module->pivot->ended_at?? 'In progress' }}</h4>
                                </li>
                            @endforeach
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
