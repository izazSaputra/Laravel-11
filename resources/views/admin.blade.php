<x-layout>
    <ul role="list" class="divide-y divide-gray-100">
        @forelse($posts as $post)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <p>{{ $post->id }}</p>
                    @if ($post->author)
                        <div class="min-w-0 flex-auto">
                            <a href="{{ $post->author->username }}" class="text-sm/6 font-semibold text-gray-900">{{ $post->author->name }}</a>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $post['body'] }}</p>
                        </div>
                    @endif
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <form method="POST" action="{{ route('post.updateStatus', $post->id) }}">
                        @csrf
                        <button type="submit">Ubah Status</button>
                    </form>
                    <p class="mt-1 text-xs/5 text-gray-500">Created {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            </li>
        @empty
            <section class="bg-white dark:bg-gray-900">
                <center>
                    <div class="py-8 px-9 mx-auto max-w-screen-xl lg:py-38 lg:px-6">
                        <div class="mx-auto max-w-screen-sm text-center">
                            <h1
                                class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
                                404</h1>
                            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">
                                Something's missing.</p>
                            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we
                                can't
                                find
                                that page. You'll find lots to explore on the home page. </p>
                            <a href="/posts"
                                class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back
                                to PostPAge</a>
                        </div>
                    </div>
                </center>
            </section>
        @endforelse
    </ul>


</x-layout>


{{-- <x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
            <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
                <h2 class="shrink-0 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Report

                    <form class="mt-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full flex-1 lg:max-w-sm">
                            <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 ps-9 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Search Your Post!" type="search" id="search" name="search" required />
                        </div>

                        <button type="submit" data-modal-target="question-modal" data-modal-toggle="question-modal"
                            class="mt-4 w-full shrink-0 rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0 sm:w-auto">Search</button>
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button"
                            class="mt-4 w-full shrink-0 rounded-lg bg-primary-700 px-3 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0 sm:w-auto">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                            </svg>
                            <span class="sr-only">Icon description</span>
                        </button>
                    </form>
            </div>

            <div class="mt-4 flow-root">
                <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                    @forelse($posts as $post)
                        <div class="space-y-4 py-6 md:py-8">
                            <div class="grid gap-5">
                                <div>
                                    <a href="/posts?category={{ $post->category->slug }}">
                                        <span
                                            class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-100 dark:bg-green-900"
                                            style="background: {{ $post->category->color }}">
                                            {{ $post->category->name }}
                                        </span>
                                    </a>
                                </div>

                                <a href="/admin/{{ $post->slug }}"
                                    class="text-xl font-semibold text-gray-900 hover:underline dark:text-white">{{ $post['title'] }}</a>
                            </div>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ Str::limit($post['body'], 150) }}</p>
                            <p class="text-sm font-bold text-gray-800 dark:text-gray-400">
                                {{ $post->created_at->diffForHumans() }}
                                <a href="#" class="text-gray-900 hover:underline dark:text-white ">
                                    @if ($post->author)
                                        <span class=" dark:text-white text-sm">
                                            <a href="/posts?author={{ $post->author->username }}"
                                                class="hover:underline">
                                                {{ $post->author->name }} </a>
                                        </span>
                                    @else
                                        <p class="text-sm text-gray-500">Author not available</p>
                                    @endif
                                </a>
                            </p>
                        </div>
                    @empty
                        <section class="bg-white dark:bg-gray-900">
                            <center>
                                <div class="py-8 px-9 mx-auto max-w-screen-xl lg:py-38 lg:px-6">
                                    <div class="mx-auto max-w-screen-sm text-center">
                                        <h1
                                            class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
                                            404</h1>
                                        <p
                                            class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">
                                            Something's missing.</p>
                                        <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we
                                            can't
                                            find
                                            that page. You'll find lots to explore on the home page. </p>
                                        <a href="/posts"
                                            class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back
                                            to PostPAge</a>
                                    </div>
                                </div>
                            </center>
                        </section>
                    @endforelse
                </div>
            </div>
    </section>
    {{ $posts->links() }}
    </section>

    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Post
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5" method="post">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Post title" autocomplete="off">
                        </div>
                        <div class="col-span-2">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select name="category" id="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="" value=" ">Select category</option>
                                @foreach ($category as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                Description</label>
                            <textarea name="body" id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write product description here"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new post
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout> --}}
