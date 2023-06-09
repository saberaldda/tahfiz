@extends('layouts.admin')

@section('title', __('Update Users'))

@section('content')

    @livewire('admin.users.update-user', ['user' => $user])

@endsection
