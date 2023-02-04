@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <a href="{{ route('drills.new') }}" class="btn btn-primary">新規作成</a>
          </div>
        </div>
      </div>
    </div>

    <h2 class="mt-4">{{ __('Drill List') }}</h2>
    <div class="row">

      @foreach ($drills as $drill)
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">{{ $drill->title }}</h3>
              <a href="{{ route('drills.show', $drill->id) }}" class="btn btn-primary">{{ __('Go Practice') }}</a>

              <a href="{{ route('drills.edit', $drill->id) }}" class="btn btn-warning">{{ __('Go Edit') }}</a>

              <form action="{{ route('drills.delete', $drill->id) }}" class="d-inline" method="POST">
                @csrf
                <button class="bnt btn-danger" onclick="return confirm('削除しますか?');">{{ __('Go Delete') }}</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
@endsection
