@extends('layouts.app')

@section('title')
{{$settings['general']->site_title}} Food Menu
@endsection

@section('content')
    <div id="menu-page">

      @include('includes.food-menu')

    </div>
@endsection
