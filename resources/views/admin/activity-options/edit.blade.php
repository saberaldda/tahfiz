@extends('layouts.admin')

@section('title', __('Update Option'))

@section('content')

    @livewire('admin.activity-options.update-option', ['activity' => $activity, 'activityOption' => $activityOption])

@endsection
