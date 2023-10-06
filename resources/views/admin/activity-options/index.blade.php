@extends('layouts.admin')

@section('title', $activity->title . __(' | Options List'))

@section('content')

    @livewire('admin.activity-options.options-list', ['activity' => $activity])

@endsection
