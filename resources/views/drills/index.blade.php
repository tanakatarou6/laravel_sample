@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>{{ __('Drill List') }}</h2>
    <div class="row">

      @foreach ($drills as $drill)
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">{{ $drill->title }}</h3>
              <a href="{{ route('drills.show', $drill->id) }}" class="btn btn-primary">{{ __('Go Practice') }}</a>

              <a href="{{ route('drills.edit', $drill->id) }}" class="btn btn-warning">{{ __('Go Edit') }}</a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
@endsection
