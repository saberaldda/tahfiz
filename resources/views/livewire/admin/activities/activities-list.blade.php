<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card mb-3">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    {{-- <h5 class="card-title">{{ __('Search Filter') }} </h5> --}}
                    <h4 class="fw-bold  mt-4"><span class="text-muted fw-light">{{ __('Activities') }} /</span> {{ __('Activities List') }}</h4>
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
                                @livewire('admin.activities.add-activity')
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row gap-3 gap-md-0">
                    <div class="col-md-3 dataTables_filter d-flex align-items-center" id="DataTables_Table_0_filter">
                        <label class="me-2 "><strong>{{ __('Search:') }}</strong></label>
                        <input wire:model="search" type="search" autofocus class="form-control flex-grow-1 me-2" placeholder="{{ __('Search...') }}" aria-controls="DataTables_Table_0">
                    </div>
                    <div class="col-md-auto justify-center align-items-center mt-2">
                        <b>{{ __('Results:') }} {{ $activities->total() }}</b>
                    </div>
                    <div class="col-md-auto ">
                        <button wire:click="clear" class="btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas">
                            <span class="d-none d-md-inline-block">{{ __('Clear Filter') }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Options Count') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Created Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                {{-- {{ $loop->iteration }} --}}
                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->activity_options_count }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <label class="form-label">{{ $activity->status ? __('Active') : __('Inactive') }}</label>
                                        <input wire:click="changeStatus({{ $activity->id }})" class="form-check-input" type="radio"
                                        @if ($activity->status) checked @endif
                                        onclick="return confirm('{{ __('Are you sure you want to change the category status?') }}') || event.stopImmediatePropagation()">
                                    </div>
                                </td>
                                <td>{{ $activity->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-link p-0 me-3" data-bs-toggle="modal" data-bs-target="#showActivity{{$activity->id}}">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a class="btn btn-link p-0 me-3 text-success" href="{{ route('activities.options.index', ['activity' => $activity->id]) }}">
                                            <i class='bx bx-select-multiple'></i>
                                        </a>
                                        <a class="btn btn-link p-0 me-3" href="{{ route('activities.edit', ['activity' => $activity->id]) }}">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <a wire:click="delete({{ $activity->id }})" onclick="return confirm('{{ __('Are you sure you want to delete the activity?') }}') || event.stopImmediatePropagation()" 
                                            class="btn btn-link p-0 text-danger">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            {{-- Show Activity Modal --}}
                            <div class="modal fade" id="showActivity{{$activity->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addActivityTitle">{{ __('Activity Details') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <x-input label="Title" name="title" value="{{ $activity->name }}" disabled />
                                                </div>
                                            </div>
                                            <br>
                                            <h5 class="modal-title" id="addQuestionTitle">{{ __('Activity Options') }}</h5>
                                            <br>
                                            @foreach ($activity->activityOptions as $option)
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label for="">{{ __('Title') }}</label>
                                                        <input type="text" class="form-control" value="{{ __($option->name) }}" disabled />
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="">{{ __('Points') }}</label>
                                                        <input type="text" class="form-control" value="{{ $option->points }}" disabled
                                                        style="background-color: #ffffff38; color: green;  font-weight: bold;" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                {{ __('Close') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-sm-center">
                    @php try { $activities->links();} catch (\Throwable $th) { $pagerror = true;} @endphp
                    @if (!$pagerror = false)  <div>{{ $activities->links() }}</div> @endif
                </div>
                <div class="d-flex justify-content-sm-center">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                        {{ __('Showing') }} {{ $activities->firstItem() }}  {{ __('to') }} {{ $activities->lastitem() }} {{ __('of') }} <b>{{ $activities->total() }}</b> {{ __('entries') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
