@extends('layouts/main')
@section('title','Home')

@section('main-content')

<!-- ABOUT US -->
<div class="container-fluid">
    <div class="row" style="background-color: #EDD07F;">
        <h2 class="text-center pt-4 fw-bold">ABOUT US</h1>
            <p class="justify  pb-2 font-size">
                GUP Media adalah platform media digital kepemudaan yang ditujukan untuk pengembangan pribadi pemuda Indonesia melalui berbagai program dan Project yang GUP Media adakan seperti podcast, youth content, Growup webinar, dan online class kepojurusan (membahas bedah jurusan yang ada di perkuliahan). di awal berdirinya GUP Media pada Mei tahun 2020, GUP Media masih berupa podcast, dan seiring berjalannya waktu GUP Media pun bisa berkembang sampai sekarang dan menjangkau banyak orang. Awal mula berkembangnya GUP Media karena kami merasa bahwa potensi dari platform ini untuk bisa memberikan manfaat bagi banyak orang khususnya pemuda indonesia sangatlah besar maka kami berinisiasi untuk mencoba mengembangkan platform ini yang awalnya hanya berupa podcast sampai memiliki beberapa project yang rutin diadakan setiap minggunya seperti GrowUp Webinar dan Online Class Kepo Jurusan.
            </p>
    </div>
    <!-- /ABOUT US -->


    <!-- GROW UP WEBINAR -->
    <div class="row background pt-4">
        <div class="col-12">
            <img src="{{ asset('img/grow_up.png') }}" alt="Logo" height="80px" class="mx-auto d-block">
        </div>
        <div class="row">
            <div class="col-12">
                <p class="justify mt-3 font-size">
                    Grow Up Webinar adalah program yang dibuat untuk para pemuda di seluruh Indonesia. Dalam program para peserta akan mendapatkan insight dari para narasumber yang berpengalaman dibidangnya. Lewat program ini gupmedia.id berharap generasi muda akan mendapatkan oportunity yang bermanfaat bagi pengembangan karir, personal life, dll agar kelak mampu menjadi #GrowUpMaksimal.
                </p>
            </div>
            <a href="{{ route('webinar') }}" class="btn mb-4 btn-md btn-secondary more-info rounded-pill mx-auto d-block"> More Info</a>
        </div>
    </div>
    <!-- GROW UP WEBINAR -->


    <!-- OUR IMPACT -->
    <div class="row background pt-4">
        <h2 class="text-center fw-bold">OUR IMPACT</h2>
    </div>
    <div class="row background pt-3 justify-content-around">
        <div class="col-3">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="{{ asset('img/instagram.png') }}" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    10.000+
                </p>
                <p class="fs-6 text-center">
                    Followers Instagram
                </p>
            </div>
        </div>
        <div class="col-3">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="{{ asset('img/grow_up.png') }}" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    25
                </p>
                <p class="fs-6 text-center">
                    Webinars
                </p>
            </div>
        </div>
        <div class="col-3">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="{{ asset('img/kepo_jurusan.png') }}" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    50
                </p>
                <p class="fs-6 text-center">
                    Online Class KepoJurusan
                </p>
            </div>
        </div>
    </div>
    <div class="row background py-5 justify-content-around">
        <div class="col-3">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="{{ asset('img/partner.png') }}" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    150+
                </p>
                <p class="fs-6 text-center">
                    Partners
                </p>
            </div>
        </div>
        <div class="col-3">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="{{ asset('img/participant.png') }}" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    15.000+
                </p>
                <p class="fs-6 text-center">
                    Our Program Participant
                </p>
            </div>
        </div>
        <div class="col-3">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="{{ asset('img/speakers.png') }}" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    75
                </p>
                <p class="fs-6 text-center">
                    Speakers
                </p>
            </div>
        </div>
    </div>
    <!-- /OUR IMPACT -->


    <!-- OUR TEAM -->
    <div class="row p-3" style="background-color: #EDD07F;">
        <h2 class="text-center fw-bold">OUR TEAM</h2>
    </div>
    <div class="row p-3 justify-content-around" style="background-color: #EDD07F;">
        <div class="col-3">
            <img src="{{ asset('img/suci.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            <p class="mt-2 fs-4 fw-bold text-center">
                Suci Intan Illahi
            </p>
            <p class="fs-6 text-center">
                Business Analyst
            </p>
        </div>
        <div class="col-3">
            <img src="{{ asset('img/muti.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            <p class="mt-2 fs-4 fw-bold text-center">
                Mutiara Salsabila
            </p>
            <p class="fs-6 text-center">
                Front-End Developer
            </p>
        </div>
        <div class="col-3">
            <img src="{{ asset('img/achmad.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            <p class="mt-2 fs-4 fw-bold text-center">
                Achmad Rafi Rasyiddin
            </p>
            <p class="fs-6 text-center">
                Project Manager
            </p>
        </div>
        <div class="col-3">
            <img src="{{ asset('img/kanza.png') }}" alt="Logo" height="150" class="mx-auto d-block">
            <p class="mt-2 fs-4 fw-bold text-center">
                Kanza Azzahra
            </p>
            <p class="fs-6 text-center">
                UI/UX Designer
            </p>
        </div>
    </div>
    <!-- OUR TEAM -->
</div>

@endsection