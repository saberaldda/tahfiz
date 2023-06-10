<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('Users') }} /</span> {{ __('Users list') }}</h4>
    <div class="card">
        <div class="card mb-3">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">{{ __('Search Filter') }} </h5>
                    <div class="d-flex ms-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser"> {{ __('Add new User') }} </button>
                    </div>
                    <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUserTitle">{{ __('Add new User') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                @livewire('admin.users.add-user')
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
                    <div class="col-md-3 user_type">
                        <select wire:model="type" id="UserPlan" class="form-select text-capitalize">
                            <option value="">{{ __('Select Type') }}</option>
                            <option value="student">{{ __('Student') }}</option>
                            {{-- <option value="teacher">{{ __('Teacher') }}</option> --}}
                            <option value="admin">{{ __('Admin') }}</option>
                        </select>
                    </div>
                
                    <div class="col-md-3 user_status">
                        <select wire:model="status" id="FilterTransaction" class="form-select text-capitalize">
                            <option value="">{{ __('Select Status') }}</option>
                            <option value="1" class="text-capitalize">{{ __('Active') }}</option>
                            <option value="0" class="text-capitalize">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                    <div class="col-md-auto justify-center align-items-center mt-2">
                        <b>{{ __('Results:') }} {{ $users->total() }}</b>
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
                            <th>{{ __('Photo') }}</th>
                            <th>{{ __('Name') }}</th>
                            {{-- <th>{{ __('Email') }}</th> --}}
                            <th>{{ __('النقاط') }}</th>
                            <th>{{ __('User Type') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Create Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td class="clickable-tr" data-bs-toggle="modal" data-bs-target="#showUser{{$user->id}}">
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="{{ __('tooltip-custom') }}" data-bs-placement="top"
                                            class="avatar avatar-lg pull-up" title="{{ $user->name }}">
                                            <img src="{{ $user->full_photo_path }}" alt="{{ __('User photo') }}" class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td class="clickable-tr" data-bs-toggle="modal" data-bs-target="#showUser{{$user->id}}">{{ $user->name }}</td>
                                {{-- <td class="clickable-tr" data-bs-toggle="modal" data-bs-target="#showUser{{$user->id}}"><strong>{{ $user->email }}</strong></td> --}}
                                <td>{{ $user->points_count }}</td>
                                <td><span class="badge bg-label-{{ ($user->type == "admin") ? "danger" : (($user->type == "teacher") ? "success" : "info") }} me-1">
                                    <strong>{{ __($user->type) }}</strong>
                                    </span>
                                </td>
                                <td>
                                    <button wire:click="changeStatus({{ $user->id }})" class="cursor-pointer btn btn-sm bg-label-{{ $user->status ? 'primary' : 'danger' }} me-1" type="button"
                                        onclick="return confirm('{{ __('Are you sure you want to change the user status?') }}') 
                                        || event.stopImmediatePropagation()">
                                        <span>{{ $user->status ? __('Active') : __('Inactive') }}</span>
                                    </button>
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('users.evaluation') }}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                {{ __('اضافة تقييم') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('users.edit', ['user' => $user->id]) }}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                {{ __('Edit') }}
                                            </a>
                                            <a wire:click="delete({{ $user->id }})" onclick="return confirm('{{ __('Are you sure you want to delete user?') }}') 
                                                || event.stopImmediatePropagation()" 
                                                class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            {{ __('Delete') }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- Show User Modal --}}
                            <div class="modal fade" id="showUser{{$user->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addUserTitle">{{ __('User Details') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                <img src="{{ $user->full_photo_path }}" alt="" class="w-px-150 h-px-150 rounded-circle">
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="nameWithTitle" class="form-label">{{ __('Name') }}</label>
                                                    <input type="text" id="nameWithTitle" class="form-control" value="{{ $user->name }}" disabled />
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="emailWithTitle" class="form-label">{{ __('Email') }}</label>
                                                    <input type="text" id="emailWithTitle" class="form-control" value="{{ $user->email }}" disabled />
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="DOBWithTitle" class="form-label">{{ __('Birth date') }}</label>
                                                    <input type="date" id="DOBWithTitle" class="form-control" value="{{ __($user->date_of_birth) }}" disabled />
                                                </div>
                                                {{-- <div class="col mb-0">
                                                    <label for="genderWithTitle" class="form-label">{{ __('Gender') }}</label>
                                                    <input type="text" id="genderWithTitle" class="form-control" value="{{ __($user->gender) }}" disabled />
                                                </div> --}}
                                                <div class="col mb-0">
                                                    <label for="typeWithTitle" class="form-label">{{ __('User Type') }}</label>
                                                    <input type="text" id="typeWithTitle" class="form-control" value="{{ __($user->type) }}" disabled />
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="statusWithTitle" class="form-label">{{ __('Status') }}</label>
                                                    <input type="text" id="statusWithTitle" class="form-control" value="{{ $user->status ? __('Active') : __('Inactive') }}" disabled />
                                                </div>
                                            </div>
                                            {{-- <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="mobileWithTitle" class="form-label">{{ __('Mobile Number') }}</label>
                                                    <input type="text" id="mobileWithTitle" class="form-control" value="{{ __($user->mobile_number) }}" disabled />
                                                </div>
                                            </div> --}}
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="noteWithTitle" class="form-label">{{ __('Notes') }}</label>
                                                    <textarea id="noteWithTitle" class="form-control" placeholder="{{ __('No Notes') }}" disabled >{{ $user->note }}</textarea>
                                                </div>
                                            </div>
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
                    @php try { $users->links();} catch (\Throwable $th) { $pagerror = true;} @endphp
                    @if (!$pagerror = false)  <div>{{ $users->links() }}</div> @endif
                </div>
                <div class="d-flex justify-content-sm-center">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                        {{ __('Showing') }} {{ $users->firstItem() }}  {{ __('to') }} {{ $users->lastitem() }} {{ __('of') }} <b>{{ $users->total() }}</b> {{ __('entries') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
