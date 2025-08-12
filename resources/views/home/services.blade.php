<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Post </h1>
        <p class="services_text">A page where built environment professionals share notes and post articles</p>
        <div class="services_section_2">
            <div class="row">

                @foreach ($post as $post)
                    <div style= "padding: 30px;  text-align:center" class="col-md-5">
                        @if ($post->image)
                            <div>
                                <img style="width:auto; padding:10px; object-fit:contain;"
                                    src="/postimage/{{ $post->image }}">
                            </div>
                        @endif
                        <h2>{{ $post->title }}</h2>

                        <p>Post By <b>{{ $post->name }}</b></p>
                        <p>Posted In: {{ $post->category?->name ?? 'Uncategorized' }}</p>

                        <div class="btn_main"><a href="{{ url('post_details', $post->id) }}">Read More</a></div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
