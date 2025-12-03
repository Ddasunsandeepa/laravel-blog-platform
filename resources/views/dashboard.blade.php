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
            <x-category-tabs />

            {{-- ----------------------- --}}

            <div class="mt-9 text-gray-900">
                <div class="p-4">
                    <!-- Responsive Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        @forelse ($posts as $post)
                            <x-post-item :post="$post" />

                        @empty
                            <!-- Beautiful Empty State -->
                            <div
                                class="col-span-1 sm:col-span-2 lg:col-span-3 flex flex-col items-center justify-center py-20">

                                <svg class="w-20 h-20 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5V21h4.5L19 9.5l-4.5-4.5L3 16.5z" />
                                </svg>

                                <h2 class="text-xl font-semibold text-gray-700 mb-2">No Posts Found</h2>

                                <p class="text-gray-500 mb-4">There are no posts available right now. Please check back
                                    later.</p>

                                <a href="#"
                                    class="px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                                    Create New Post
                                </a>
                            </div>
                        @endforelse

                    </div>

                    <div class="mt-12">
                        {{ $posts->links() }}
                    </div>

                </div>
            </div>


        </div>
    </div>
</x-app-layout>