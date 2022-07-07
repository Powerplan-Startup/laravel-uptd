@extends('public.main')
@push('head')
    <style>
        .min-scrollbar::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        .min-scrollbar::-webkit-scrollbar-track {
            background: #fff0;
        }
        .min-scrollbar::-webkit-scrollbar-thumb {
            background: #bebebe41;
            border-radius: 8px;
        }
        .min-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a4a4a441;
        }
    </style>
@endpush
@section('container')
<main id="main">

<div class="blog-page area-padding">
    <div class="container">
        <div style="max-width: 600px">
            <div style="padding: 1rem; padding-bottom: .5rem">
                <h4 style="max-width: 250px">
                    Pelatihan akan dilaksanakan
                </h4>
            </div>
            <div style="padding: .25rem; display: flex; flex-wrap: nowrap; overflow-x: auto; scroll-snap-type: x mandatory;" class="min-scrollbar">
                @forelse ($jadwal as $key => $item)
                    <div style="height: 6rem; min-width: 10rem; 
                    @if($key == 0) background: #4e6dfe; color: #fff; @else background: #e8e9f4; color: #333; @endif border-radius: .15rem; margin-right: .5rem; scroll-snap-align: none; padding: 1rem;">
                        <h5 style="margin-bottom: 0%">
                            {{ $item->tanggal->format('d') }}
                            {{ $item->tanggal->format('M') }}
                            {{ $item->tanggal->format('Y') }}
                        </h5>
                        <div>
                            {{ $item->judul }}
                        </div>
                    </div>
                @empty
                    <div style="height: 6rem; width: 100%; 
                    background: #e8e9f4; color: #333; border-radius: .15rem; margin-right: .5rem; scroll-snap-align: none; padding: 1rem;">
                        <h1 style="">
                            :(
                        </h1>
                        <div>
                            Belum ada jadwal kegiatan terbaru
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div style="padding: 1rem">
            <h2 style="max-width: 250px">
                {{ $post->judul }}
            </h2>
            <!-- <div style="background-image: url('{{ asset('storage/'.$post->cover) }}'); background-size: cover; background-position: center; width: 100%;">
                            <div style="height: 250px; width: 100%"></div>
                        </div> -->
            <div>
                <div style="margin-bottom: 2rem">
                    {{ $post->created_at->format('d M Y') }}
                </div>
            </div>
            <hr>
            <div>
                {!! $post->isi !!}
            </div>
        </div>
    </div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection