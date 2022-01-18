@extends('layouts/main')

@section('title','Notifikasi')

@section('main-content')

<div class="container-fluid py-3 background" style="min-height: 768px;">
    <div class="container my-3">
        <div class="row bg-white shadow" style="border-radius: 8px">
            <div class="col-6">
                <h4 class="my-auto p-2 fw-bold text-uppercase">Notifikasi</h4>
            </div>
            <div class="col-6 my-auto text-end">
                <a href="{{ route('notifikasi.mark-as-read') }}" class="text-black text-decoration-none hover {{ ($mark_as_read > 0) ? '':'btn disabled'}}">Tandai sudah dibaca</a>
            </div>
        </div>
    </div>

    <div class="container bg-white mb-1 shadow" style="border-radius: 8px;">
        @foreach ($notif as $n)
        <div class="row border-top px-3" style="opacity: {{ ($n->read_at === null) ? '1' : '0.5' }}">
            <div class="col-md-2 ml-3 mt-4 mb-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="100" class="float-start">
            </div>
            <div class="col-md-8 mt-4 mb-4">
                <div class="row fw-bold">
                    {{ $n->header }}
                </div>
                <div class="row text-muted">
                    {{ $n->body }}
                </div>
            </div>
            <div class="col-md-2 mt-4 mb-4">
                <p class="float-end text-muted">{{ $n->created_at->format('d M, h:i') }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection