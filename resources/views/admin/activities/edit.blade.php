@extends('layouts.admin')

@section('title', __('Update Activity'))

@section('content')

    @livewire('admin.activities.update-activity', ['activity' => $activity])

@endsection
