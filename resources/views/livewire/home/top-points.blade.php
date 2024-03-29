<div wire:poll.10000ms class="scrolling-div">
    @foreach ($users as $user)
    <div class="bg-[#BD8A36] rounded-lg p-4 mb-7" style="background-image: url({{ asset('assets/back-pattern.png') }})">
        <div class="border rounded-lg p-3 flex justify-between items-center bg-gray-200" dir="rtl">
            <div class="flex gap-2 sm:gap-4 md:gap-6 items-center">
                <p class="font-semibold text-2xl sm:text-4xl me-2">{{ $loop->iteration }}</p>
                <img class="w-16 h-16 sm:w-20 sm:h-20 rounded-full" src="{{ $user->full_photo_path }}"
                    alt="Rounded avatar" />
                <p class="font-semibold text-2xl sm:text-4xl me-2">{{ $user->name }}</p>
            </div>
            <p class="font-medium text-2xl sm:text-4xl text-gray-600">{{ $user->total_points }} نقطة</p>
        </div>
    </div>
    @endforeach
</div>
