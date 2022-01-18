@extends('layouts/main')

@section('title','Webinar')
@section('main-content')

<div class="container-fluid">
    <!-- GUP MEDIA INTERNSHIP PROGRAM -->
    <div class="col position-relative">
        <div class="row pt-3 justify-content-center background-header">
            <div class="col-2">
                <img src="img/suci.png" alt="Logo" height="150" class="mx-auto d-block">
            </div>
            <div class="col-2">
                <img src="img/muti.png" alt="Logo" height="150" class="mx-auto d-block">
            </div>
            <div class="col-2">
                <img src="img/achmad.png" alt="Logo" height="150" class="mx-auto d-block">
            </div>
            <div class="col-2">
                <img src="img/kanza.png" alt="Logo" height="150" class="mx-auto d-block">
            </div>
        </div>
        <div class="text-center position-absolute top-0 h-100 w-100 d-flex flex-column align-items-center">
            <div class="text my-auto">
                <h1 class="m-0 fw-bold text-uppercase">Grow Up webinar</h1>
                <h2 class="text-uppercase">#Bantukamujadigrowupmaksimal!</h2>
            </div>
        </div>
    </div>
    <!-- /GUP MEDIA INTERNSHIP PROGRAM -->


    <!-- GROW UP WEBINAR -->
    <div class="row background p-3 pt-4">
        <div class="col-12">
            <img src="img/grow_up.png" alt="Logo" height="80px" class="mx-auto d-block">
        </div>
        <div class="row">
            <div class="col-12">
                <p class="justify mt-3 font-size">
                    Grow Up Webinar adalah program yang dibuat untuk para pemuda di seluruh Indonesia. Dalam program para peserta akan mendapatkan insight dari para narasumber yang berpengalaman dibidangnya. Lewat program ini gupmedia.id berharap generasi muda akan mendapatkan oportunity yang bermanfaat bagi pengembangan karir, personal life, dll agar kelak mampu menjadi #GrowUpMaksimal.
                </p>
            </div>
            <a href="#chooseRole" class="btn mb-4 btn-md btn-secondary more-info rounded-pill mx-auto d-block"> More Info</a>
        </div>
    </div>
    <!-- /GROW UP WEBINAR -->


    <!-- OUR IMPACT -->
    <div class="row background p-3">
        <h2 class="text-center fw-bold">OUR IMPACT</h2>
    </div>
    <div class="row background p-3 justify-content-around">
        <div class="col-3">
            <div class="container bg-white rounded-radius p-4">
                <img src="img/instagram.png" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    10.000+
                </p>
                <p class="fs-6 text-center">
                    Followers Instagram
                </p>
            </div>
        </div>
        <div class="col-3">
            <div class="container bg-white rounded-radius p-4">
                <img src="img/grow_up.png" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    25
                </p>
                <p class="fs-6 text-center">
                    Webinars
                </p>
            </div>
        </div>
        <div class="col-3">
            <div class="container bg-white rounded-radius p-4">
                <img src="img/kepo_jurusan.png" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    50
                </p>
                <p class="fs-6 text-center">
                    Online Class KepoJurusan
                </p>
            </div>
        </div>
    </div>
    <div class="row background p-3 justify-content-around">
        <div class="col-3 mt-2 mb-4">
            <div class="container bg-white rounded-radius p-4">
                <img src="img/partner.png" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    150+
                </p>
                <p class="fs-6 text-center">
                    Partners
                </p>
            </div>
        </div>
        <div class="col-3 mt-2 mb-4">
            <div class="container bg-white rounded-radius p-4">
                <img src="img/participant.png" alt="Logo" height="75" class="mx-auto d-block">
                <p class="mt-2 fs-4 fw-bold text-center">
                    15.000+
                </p>
                <p class="fs-6 text-center">
                    Our Program Participant
                </p>
            </div>
        </div>
        <div class="col-3 mt-2 mb-4">
            <div class="container bg-white rounded-radius p-4">
                <img src="img/speakers.png" alt="Logo" height="75" class="mx-auto d-block">
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


    <!-- REQUIREMENT -->
    <div class="row pb-4 justify-content-center" id="requirement" style="background-color: #EDD07F;">
        <h2 class="text-center fw-bold pt-3 pb-3">REQUIREMENT</h2>
        <div class="col-10">
            <ul class="text-uppercase fw-bold mt-2 font-size">
                <li>All highschool student and all university student in indonesia in any major.</li>
                <li>A good team player who is passionate in carrying out their responsibilities.</li>
                <li>Eager learner and also adaptive to new environment.</li>
                <li>Uploading twibbon on the main Instagram account and make sure the instagram account is not private. Click here for twibbon template</li>
                <li>Curriculum Vitae along with relevant experience.</li>
                <li>Motivation Letter outlining why you choose Skill Up as a place to learn and grow.</li>
                <li>Supporting document depends on the position.</li>
            </ul>
        </div>
    </div>
    <!-- /REQUIREMENT -->


    <!-- WEBINAR REGISTER -->
    <div class="col-12">
    <div class="row background p-3" id="chooseRole">
        <h2 class="text-center fw-bold text-uppercase">CHOOSE YOUR ROLE!</h2>
    </div>
        @foreach ($webinar as $w)
        <div class="row background pb-5 justify-content-around">
            <div class="col-3">
                <img src="{{ asset('storage/webinar-icon/'. $w->icon) }}" alt="Logo" height="120" class="mx-auto d-block">
            </div>
            <div class="col-6">
                <h2 class="mt-2 fs-4 fw-bold text-start text-uppercase">
                    {{ $w->name }}
                </h2>
                <p class="text-start text-uppercase">
                    Speaker : {{ $w->speaker }}
                </p>
            </div>
            <div class="col-3">
                <a href="{{ route('webinar.pendaftaran.create', $w->id) }}" class="btn mb-4 btn-md btn-secondary more-info rounded-pill float-start"> Register</a>
            </div>
        </div>
        @endforeach
        </div>
    <!-- /WEBINAR REGISTER -->


    <!-- WEBINAR TIMELINE -->
    <div class="row justify-content-center" style="background-color: #EDD07F;">
        <h2 class="text-center fw-bold pt-4 pb-3">WEBINAR TIMELINE</h2>
        @foreach ($webinar as $w)
        <div class="col-3">
            <img src="{{ asset('storage/webinar-icon/' . $w->icon) }}" alt="Logo" height="120" class="mx-auto d-block">
            <h6 class="mt-2 fw-bold text-center text-uppercase">
                {{ $w->name }}
            </h6>
            <p class="text-center text-uppercase font-size">
                {{ $w->timeline->format('d F Y') }}
            </p>
        </div>
        @endforeach
    </div>
    <!-- /WEBINAR TIMELINE -->


    <!-- FAQ -->
    <div class="row background p-3">
        <h2 class="text-center fw-bold text-uppercase pt-3">frequently questions and answer</h2>
    </div>
    <div class="row background p-3">
        <div class="col-12 pb-3">
            <h2 class="fs-4 fw-bold text-start text-uppercase">
                <ul>
                    <li onclick="toggleApply()" style="cursor: pointer;"> How do i apply? </li>
                </ul>
            </h2>
            <h5 class="justify text-uppercase ms-4" id="apply" style="display: none;">
                just click the register button and fill in your personal information such as name, whatsapp number, etc. then click the submit button
            </h5>
        </div>
        <div class="col-12 pb-3">
            <h2 class="fs-4 fw-bold text-start text-uppercase">
                <ul>
                    <li onclick="toggleMany()" style="cursor: pointer;">how many Webinar can i apply? </li>
                </ul>
            </h2>
            <h5 class="justify text-uppercase ms-4" id="many" style="display: none;">
                You can choose to join only 1 webinar or you can take a whole series of webinars
            </h5>
        </div>
        <div class="col-12 pb-3">
            <h2 class="fs-4 fw-bold text-start text-uppercase">
                <ul>
                    <li onclick="toggleBenefits()" style="cursor: pointer;">What benefits will participants get?? </li>
                </ul>
            </h2>
            <h5 class="justify text-uppercase ms-4" id="benefits" style="display: none;">
                the benefit you will receive is an e-certificate because you have participated in the webinar for all participants, and of course there are still some interesting prizes that we will share on the D day of the webinar
            </h5>
        </div>
        <div class="col-12 pb-3">
            <h2 class="fs-4 fw-bold text-start text-uppercase">
                <ul>
                    <li onclick="toggleFree()" style="cursor: pointer;">is this webinar free? </li>
                </ul>
            </h2>
            <h5 class="justify text-uppercase ms-4" id="free" style="display: none;">
                That's right! this webinar is free for all participants
            </h5>
        </div>
    </div>
    <!-- FAQ -->
</div>

<script>
    function toggleApply() {
        var apply = document.getElementById("apply");

        if (apply.style.display === "none") {
            apply.style.display = "block";
        } else {
            apply.style.display = "none";
        }
    }

    function toggleMany() {
        var many = document.getElementById("many");

        if (many.style.display === "none") {
            many.style.display = "block";
        } else {
            many.style.display = "none";
        }
    }

    function toggleBenefits() {
        var benefits = document.getElementById("benefits");

        if (benefits.style.display === "none") {
            benefits.style.display = "block";
        } else {
            benefits.style.display = "none";
        }
    }

    function toggleFree() {
        var free = document.getElementById("free");

        if (free.style.display === "none") {
            free.style.display = "block";
        } else {
            free.style.display = "none";
        }
    }
</script>

@endsection