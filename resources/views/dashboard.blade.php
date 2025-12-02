<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".tab-item");
        const dropdown = document.querySelector("#tabs-icons");

        // Desktop tab click
        tabs.forEach(tab => {
            tab.addEventListener("click", function (e) {
                e.preventDefault();

                tabs.forEach(t => t.classList.remove("active-tab"));
                this.classList.add("active-tab");

                // sync dropdown value
                dropdown.value = this.dataset.name;
            });
        });

        // Mobile dropdown change
        dropdown.addEventListener("change", function () {
            tabs.forEach(t => t.classList.remove("active-tab"));

            const match = [...tabs].find(t => t.dataset.name === this.value);
            if (match) match.classList.add("active-tab");
        });
    });

</script>

<style>
    /* Active tab default colors */
    .active-tab {
        background-color: #2563eb;
        color: white;
        border-color: #2563eb;
    }

    /* active tab does NOT change on hover */
    .active-tab:hover {
        background-color: #2563eb !important;
        color: white !important;
        border-color: #2563eb !important;
    }

    /* hover for inactive tabs only */
    .tab-item:not(.active-tab):hover {
        background-color: #bdbdbd;
        border-color: #00196a;
        color: black;
    }

    /* smooth transitions */
    .tab-item {
        transition: all 0.2s ease-in-out;
    }
</style>



<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <div class="sm:hidden">
                        <select id="tabs-icons"
                            class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border rounded-base">
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

            {{-- ----------------------- --}}

            <div class="mt-9 text-gray-900">
                <div class="p-4">

                    <!-- Responsive Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        @foreach ($posts as $post)
                            <div
                                class="bg-white rounded-2xl shadow-md border hover:shadow-xl transition-all duration-300 overflow-hidden">

                                <!-- Image -->
                                <a href="#">
                                    <img class="w-full h-48 object-cover"
                                        src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="Post Image">
                                </a>

                                <div class="p-5">

                                    <!-- Title -->
                                    <a href="#">
                                        <h5 class="text-xl font-semibold text-gray-900 mb-3 hover:text-blue-600 transition">
                                            {{ $post->title ?? 'Post Title' }}
                                        </h5>
                                    </a>

                                    <!-- Description -->
                                    <div class="text-gray-600 mb-4 line-clamp-3">
                                        {{ Str::words($post->content ?? 'This is a short description of the blog post content...', 15) }}
                                    </div>

                                    <!-- Button -->
                                    <a href="#"
                                        class="inline-flex items-center bg-blue-600 text-white hover:bg-blue-700 transition font-medium rounded-lg px-4 py-2 text-sm">
                                        Read More
                                        <svg class="w-4 h-4 ml-1.5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>


        </div>
    </div>
</x-app-layout>