<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $search;
    public $type;
    public $status;

    protected $queryString = ['search' => ['except' => ''], 'type' => ['except' => ''], 'status' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->type = 'student';
    }
    
    public function updated()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->search = '';
        $this->type = '';
        $this->status = '';
    }

    public function render()
    {
        $users = User::withCount('points')
        ->when($this->type, function ($query) {
            $query->where('type', $this->type);
        })
        ->when(($this->status !== '' && $this->status !== null), function ($query) {
            $query->where('status', $this->status);
        })
        ->when($this->search !== '', function ($query) {
            $query->where(function($subQuery) {
                $subQuery->where('name', 'like', "%$this->search%")
                         ->orWhere('email', 'like', "%$this->search%");
                        //  ->orWhere('mobile_number', 'like', "%$this->search%");
            });
        })
        ->get()
        ->map(function ($user) {
            $total_points = $user->points->sum(function ($point) {
                return $point->activityOption->points;
            });
    
            $user->total_points = $total_points;
            return $user;
        })
        ->sortByDesc('total_points');

        // pagination info
        $perPage = 10;
        $page = \Illuminate\Pagination\Paginator::resolveCurrentPage('page');
        $users = new \Illuminate\Pagination\LengthAwarePaginator(
    $users->forPage($page, $perPage), $users->count(), $perPage, $page,
    ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]
);

        return view('livewire.admin.users.users-list', compact('users'));
    }

    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
