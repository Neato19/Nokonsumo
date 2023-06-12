@props(['category'])

<a href="/post/?category={{ $category->slug }}"
   class="transition-colors duration-300 px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:border-white hover:text-white"
   style="font-size: 10px"
>{{ $category->name }}</a>
