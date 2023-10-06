<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card mb-3">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- <h5 class="card-title">{{ __('Search Filter') }} </h5> --}}
                    <h4 class="fw-bold  mt-4"><span class="text-muted fw-light">{{ $activity->name }} /</span> {{ __('Options List') }}</h4>
                    <div class="d-flex ms-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addActivity"> {{ __('Add New') }} </button>
                    </div>
                    <div class="modal fade" id="addActivity" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addActivityTitle">{{ __('Add new Activity') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                @livewire('admin.activity-options.add-option', ['activity' => $activity])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Points') }}</th>
                            <th>{{ __('Created Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($activityOptions as $activityOption)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $activityOption->name }}</td>
                                <td>{{ $activityOption->points }}</td>
                                <td>{{ $activityOption->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-link p-0 me-3" href="{{ route('activities.options.edit', ['activity' => $activity->id, 'option' => $activityOption->id]) }}">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <a wire:click="delete({{ $activityOption->id }})" onclick="return confirm('{{ __('Are you sure you want to delete the activity?') }}') || event.stopImmediatePropagation()" 
                                            class="btn btn-link p-0 text-danger">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-sm-center">
                    @php try { $activityOptions->links();} catch (\Throwable $th) { $pagerror = true;} @endphp
                    @if (!$pagerror = false)  <div>{{ $activityOptions->links() }}</div> @endif
                </div>
                <div class="d-flex justify-content-sm-center">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                        {{ __('Showing') }} {{ $activityOptions->firstItem() }}  {{ __('to') }} {{ $activityOptions->lastitem() }} {{ __('of') }} <b>{{ $activityOptions->total() }}</b> {{ __('entries') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
