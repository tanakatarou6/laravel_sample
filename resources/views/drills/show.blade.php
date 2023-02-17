@extends('layouts.app')

@section('content')
  <div id="app">
    {{-- デフォルトでは、この中ではVue.jsが有効 --}}
    {{-- expample-component はLaravelに入っているサンプルのコンポーネント --}}

    <example-component title="{{ __('practice') . '「' . $drill->title . '」' }}" :drill="{{ $drill }}"
      :problem="{{ $problem }}" category-name="{{ $drill->category_name }}">
    </example-component>
  </div>
@endsection
