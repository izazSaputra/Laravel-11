@props(["active"=> false])
<a {{ $attributes }} class=" {{ $active ? ' text-gray-600' : 'text-gray-600 dark:hover:text-white hover:bg-gray-100' }} block px-4 py-2 "
    aria-current="{{ $active ? 'page' : false}}">{{ $slot }}</a>