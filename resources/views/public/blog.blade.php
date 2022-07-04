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
        <div>
            <div style="padding: 1rem">
                <h2 style="max-width: 250px">
                    Kegiatan Yang Akan Datang
                </h2>
            </div>
            <div style="padding: .25rem; display: flex; flex-wrap: nowrap; overflow-x: auto; scroll-snap-type: x mandatory;" class="min-scrollbar">
                @forelse ($jadwal as $key => $item)
                    <div style="height: 11.5rem; min-width: 20rem; 
                    @if($key == 0) background: #4e6dfe; color: #fff; @else background: #e8e9f4; color: #333; @endif border-radius: .15rem; margin-right: .5rem; scroll-snap-align: none; padding: 2rem;">
                        <h1 style="margin-bottom: 0%">
                            {{ $item->tanggal->format('d') }}
                        </h1>
                        <div style="margin-bottom: 2rem">
                            {{ $item->tanggal->format('M') }}
                            {{ $item->tanggal->format('Y') }}
                        </div>
                        <div>
                            {{ $item->judul }}
                        </div>
                        <div>
                            {{ optional($item->kejuruan)->nama_kejuruan }}
                        </div>
                    </div>
                @empty
                    <div style="height: 11.5rem; width: 100%; 
                    background: #e8e9f4; color: #333; border-radius: .15rem; margin-right: .5rem; scroll-snap-align: none; padding: 2rem;">
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
                Berita Terbaru
            </h2>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 10rem;">
            @forelse ($posts as $item)
                <div style="margin-bottom: .5rem; width: 100%;">
                    <div style="display: flex;">
                        <div style="background-image: url('{{ asset('assets/img/uptd/1.jpg') }}'); background-size: cover; background-position: center; width: 250px;">
                            <div style="height: 100%;"></div>
                        </div>
                        <div style="min-height: 11.5rem; min-width: 20rem; background: #e8e9f4; color: #333; border-radius: .15rem; margin-right: .5rem; padding: 2rem; flex: 1">
                            <div>
                                <h3 style="margin-bottom: 0%">
                                    {{ $item->judul }}
                                </h3>
                                <div style="margin-bottom: 2rem">
                                    {{ $item->created_at->format('d M Y') }}
                                </div>
                                <div>
                                    {{ $item->deskripsi }}
                                </div>
                            </div>
                        </div>
                        <div style="padding: 2rem; width: 250px">
                            <h2>
                                {{ $item->created_at->format('d') }}
                            </h2>
                            <div>
                                <span>
                                    {{ $item->created_at->format('M') }}
                                </span>
                                <span>
                                    {{ $item->created_at->format('Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="height: 11.5rem; width: 100%; 
                background: #e8e9f4; color: #333; border-radius: .15rem; margin-right: .5rem; scroll-snap-align: none; padding: 2rem;">
                    <h1 style="">
                        :(
                    </h1>
                    <div>
                        Belum berita terbaru, silahkan periksa kembali beberapa saat
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div><!-- End Blog Page -->

</main><!-- End #main -->
@endsection