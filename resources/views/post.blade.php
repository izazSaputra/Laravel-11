<x-layout>
    <x-slot:title>{{ $post['title'] }}</x-slot:title>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24  dark:bg-gray-900 antialiased border rounded-2xl backdrop-blur-sm" style="color: #303030">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-xl text-blue-500">&laquo;Back </a>
                    <address class="flex items-center mb-2 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm dark:text-white" style="#6d9ac7">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold  dark:text-white" style="color: #51eefc;">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-100 dark:text-gray-400"><time
                                        title="{{ $post->created_at->diffForHumans() }}">{{ $post->created_at->diffForHumans() }}</time>
                                </p>
                                <a href="/posts?category={{ $post->category->slug }}">
                                    <span style="background: {{ $post->category->color }};"
                                        class="text-cyan-300 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight lg:mb-6 lg:text-4xl dark:text-white" style="color:#6d9ac7">
                        {{ $post['title'] }}</h1>
                </header>
                <p style="color: white">{{ $post['body'] }}</p>
            </article>
        </div>
    </main>
</x-layout>

{{-- <article class="py-8 max-w-screen-md border-b">
    <h2 class="mb-1 text-3xl tracking-tight font-bold text-grey-900">{{ $post['title'] }}</h2>

    <div class="text-base text-gray-500">
      <a href=" {{ '/authors/' . $post->author->username }}" class="hover:underline"> {{ $post->author->name }}  </a>
      in
      <a href="{{ '/categories/' . $post->category->slug }}" class="hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->diffForHumans() }}
    </div>
    <p class="my-4 font-light">{{ ($post['body']) }}</p>
    <a href="/posts" class="font-medium text-blue-500 hover:underline">Back &laquo;</a>
  </article>  --}}
