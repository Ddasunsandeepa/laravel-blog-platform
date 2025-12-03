<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-4 text-gray-900">
        <div class="sm:hidden">
            <select id="tabs-icons" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border rounded-base">
                <option value="All">All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <ul class="hidden sm:flex text-sm font-medium text-center text-body -space-x-px">

            <li class="w-full">
                <a href="#" data-name="All"
                    class="tab-item active-tab inline-flex items-center justify-center w-full px-4 py-2.5 border rounded-s-base">
                    All
                </a>
            </li>

            @foreach ($categories as $category)
                <li class="w-full">
                    <a href="#" data-name="{{ $category->name }}"
                        class="tab-item inline-flex items-center justify-center w-full px-4 py-2.5 border">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</div>