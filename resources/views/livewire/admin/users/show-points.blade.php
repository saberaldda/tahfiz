<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card mb-3">
            <div class="card-header border-bottom">
                <div class="row gap-3 gap-md-0">
                    <div class="col-md-4 dataTables_filter d-flex align-items-center" id="DataTables_Table_0_filter">
                        <label class="me-2 "><strong>{{ __('الاسم:') }}</strong></label>
                        <select wire:model="user" id="UserPlan" class="form-select text-capitalize">
                            <option value="">{{ __('اختر') }}</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
          
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('اليوم') }}</th>
                            @foreach ($activities as $activity)
                            <th>{{ $activity->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($points as $date => $datePoints)
                        <tr>
                            <td><strong>{{ $date }}</strong></td>
                            @foreach ($datePoints as $point)
                            <td><strong>{{ $point->activityOption->name }}</strong></td>
                            @endforeach
                        </tr>
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
