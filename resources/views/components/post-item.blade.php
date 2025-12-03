<div class="bg-white rounded-2xl shadow-md border hover:shadow-xl transition-all duration-300 overflow-hidden">

    <!-- Image -->
    <a href="#">
        <img class="w-full h-48 object-cover" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="Post Image">
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
            <svg class="w-4 h-4 ml-1.5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>
        </a>

    </div>
</div>