@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="image post">
    @else
        <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg" alt="image post">
    @endif
    <div class="px-6 py-8">
        <h1 class="font-bold text-xl mb-2 text-left">
            <a href="{{route('web.post.show',[$post])}}">{{$post->name}}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('web.post.tag',[$tag])}}"
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2" >{{$tag->name}}</a>
        @endforeach
    </div>
</article>
