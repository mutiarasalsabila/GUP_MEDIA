@extends('layouts/main')

@section('title','Internship')

@section('main-content')

<div class="container-12">
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
                <h1 class="m-0 fw-bold text-uppercase">GUP Media Internship Program</h1>
                <h2 class="text-uppercase">#Bantukamujadigrowupmaksimal!</h2>
            </div>
        </div>
    </div>
    <!-- /GUP MEDIA INTERNSHIP PROGRAM -->


    <!-- ABOUT INTERNSHIP PROGRAM -->
    <div class="row background p-3">
        <div class="col-6 mt-4">
            <img src="img/logo.png" alt="Logo" height="255px" class="float-end pe-5">
        </div>

        <div class="col-6 mt-4">
            <h2 class="text-start fw-bold text-uppercase">About Internship program</h2>
            <p class="justify mt-3 font-size">
                GUP Media adalah platform media digital kepemudaan yang ditujukan untuk pengembangan pribadi pemuda Indonesia melalui berbagai program dan Project yang GUP Media adakan seperti podcast, youth content, Growup webinar, dan online class kepojurusan. Program internship dari GUP Media ini bertujuan untuk memberikan pengalaman dan kesempatan kepada mereka yang mencari lebih banyak pembelajaran yang tentunya tidak didapatkan dibangku perkuliahan dengan terlibat langsung dalam lingkungan kerja yang produktif, positif, dan suportif dan juga meningkatkan keterampilan para internya melalui program pengembangan kami yang menyenangkan!
            </p>
            <a href="#chooseRole" class="btn mb-4 btn-md btn-secondary more-info rounded-pill mx-auto d-block float-start"> More Info</a>
        </div>
    </div>
    <!-- /ABOUT INTERNSHIP PROGRAM -->


    <!-- BENEFIT TO JOUN OUR INTENRSHIP PROGRAM -->
    <div class="row background p-3 pb-4" id="benefit">
        <h2 class="text-center fw-bold text-uppercase">benefit to join our Intenrship program</h2>
    </div>
    <div class="row background p-3 justify-content-around">
        <div class="col-5">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="img/work_experience.png" alt="Logo" height="120" class="mx-auto d-block">
                <h2 class="mt-2 fs-4 fw-bold text-center">
                    WORKING EXPERIENCE
                </h2>
            </div>
        </div>
        <div class="col-5">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="img/networking.png" alt="Logo" height="120" class="mx-auto d-block">
                <h2 class="mt-2 fs-4 fw-bold text-center">
                    NETWORKING
                </h2>
            </div>
        </div>
    </div>
    <div class="row background p-3 justify-content-around">
        <div class="col-5 mt-2 mb-4">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="img/enjoy_experience.png" alt="Logo" height="120" class="mx-auto d-block">
                <h2 class="mt-2 fs-4 fw-bold text-center">
                    ENJOY THE EXPERIENCE
                </h2>
            </div>
        </div>
        <div class="col-5 mt-2 mb-4">
            <div class="container bg-white p-4" style="border-radius: 3rem;">
                <img src="img/developing.png" alt="Logo" height="120" class="mx-auto d-block">
                <h2 class="mt-2 fs-4 fw-bold text-center">
                    DEVELOPING SKILLS
                </h2>
            </div>
        </div>
    </div>
    <!-- /BENEFIT TO JOUN OUR INTENRSHIP PROGRAM -->


    <!-- REQUIREMENT -->
    <div class="row pb-4 justify-content-center" style="background-color: #EDD07F;">
        <h2 class="text-center fw-bold pt-3 pb-3">REQUIREMENT</h2>
        <div class="col-10">
            <ul class="text-uppercase fw-bold mt-2 font-size">
                <li>First to third-year university student (batch 2019 - 2021), in any major at any university in Indonesia.</li>
                <li>Able to commit from january 2022 - july 2022.</li>
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


    {{-- choose role --}}
    <div class="container-fluid background" id="chooseRole" style="background-color:#EBEBEB;">
        <div class="container pb-3">
            <div class="row pt-3" id="internshipList">
                <h2 class="text-center fw-bold text-uppercase">CHOOSE YOUR ROLE!</h2>
            </div>

            @foreach ($internship_division as $intern)
                <div class="row background p-3 justify-content-around">
                    <div class="col-3">
                        <img src="{{ asset('storage/internship-icon/'. $intern->icon) }}" alt="Logo" style="max-height: 12rem; max-width:12rem;" class="mx-auto d-block">
                    </div>
                    <div class="col-6">
                        <h2 class="mt-2 fs-4 fw-bold text-start text-uppercase">
                            {{ $intern->name }}
                        </h2>
                        <p class="text-start text-uppercase">
                            {{ $intern->internship->count() }} Subdivisions are available for recruitment
                        </p>
                    </div>
                    <div class="col-3">
                        @if ($intern->internship->count())
                            <button type="button" class="btn mb-4 btn-md btn-secondary more-info rounded-pill float-start" onclick="toggle{{ $intern->id }}()"> More Info</button>
                        @endif
                    </div>
                </div>
            
                {{-- more info --}}
                @if ($intern->internship->count())
                        <div class="container" id="show{{ $intern->id }}" style="display: none;">
                    @foreach ($intern->internship as $internship)    
                            <div class="row background p-3 justify-content-around">
                                <div class="col-9">
                                    <h2 class="fs-4 fw-bold text-start text-uppercase">
                                        <ul>
                                            <li>{{ $internship->name }}</li>
                                        </ul>
                                    </h2>
                                    <p class="justify text-uppercase ms-4">
                                        {{ $internship->description }}
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('internship.pendaftaran.create',$internship->id) }}" class="btn mb-4 btn-md btn-secondary more-info rounded-pill float-start"> Join Now</a>
                                </div>
                            </div>
                    @endforeach
                        </div>
                @endif
            @endforeach
            {{-- end of more info --}}
        </div>
    </div>
    {{-- end of choose role --}}



    


    <!-- RECRUITMENT TIMELINE -->
    <div class="row justify-content-center pb-3" style="background-color: #EDD07F;">
        <h2 class="text-center fw-bold pt-4 pb-3">RECRUITMENT TIMELINE</h2>
        <div class="col-2">
            <img src="img/open_regist.png" alt="Logo" height="120" class="mx-auto d-block">
            <h6 class="mt-2 fw-bold text-center text-uppercase">
                Open Registration
            </h6>
            <p class="text-center text-uppercase font-size">
                28 december - 7 january
            </p>
        </div>
        <div class="col-2">
            <img src="img/cv_screening.png" alt="Logo" height="120" class="mx-auto d-block">
            <h6 class="mt-2 fw-bold text-center text-uppercase">
                CV SCREENING
            </h6>
            <p class="text-center text-uppercase font-size">
                8 january - 10 january
            </p>
        </div>
        <div class="col-2">
            <img src="img/announcement.png" alt="Logo" height="120" class="mx-auto d-block">
            <h6 class="mt-2 fw-bold text-center text-uppercase">
                announcement
            </h6>
            <p class="text-center text-uppercase font-size">
                11 January
            </p>
        </div>
        <div class="col-2">
            <img src="img/interview.png" alt="Logo" height="120" class="mx-auto d-block">
            <h6 class="mt-2 fw-bold text-center text-uppercase">
                interview
            </h6>
            <p class="text-center text-uppercase font-size">
                13 january - 17 january
            </p>
        </div>
        <div class="col-2">
            <img src="img/final_anon.png" alt="Logo" height="120" class="mx-auto d-block">
            <h6 class="mt-2 fw-bold text-center text-uppercase">
                Final announcement
            </h6>
            <p class="text-center text-uppercase font-size">
                18 January
            </p>
        </div>
    </div>
    </div>
    <!-- /RECRUITMENT TIMELINE -->

</div>

@foreach ($internship_division as $intern)
    <script>
        function toggle{{ $intern->id }}() {
            var x = document.getElementById("show{{ $intern->id }}");

            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endforeach

@endsection