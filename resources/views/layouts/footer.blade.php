@if (Auth::check())
    <script>
        $(function() {
            $('#btnLogin').hide();
        });
    </script>
@endif

<footer class="footer pt-4 pb-3">
        <div class="row justify-content-center">
            <div class="col-3">
                <!-- Button trigger modal Login-->
                <button id="btnLogin" type="button" class="btn btn-md btn-secondary more-info rounded-pill" data-bs-toggle="modal" data-bs-target="#modalLogin">
                    Login
                </button>
            </div>
            <div class="col-3">
                <p class="text-center">2021 Copyright gupmedia.id
                <p>
            </div>
            <div class="col-3">
                <div class="float-end">
                    <img src="{{ asset('img/ig_black.png') }}" alt="Logo" height="30" class="ms-3 ">
                    <img src="{{ asset('img/spotify.png') }}" alt="Logo" height="30" class="ms-3">
                    <img src="{{ asset('img/linkedin.png') }}" alt="Logo" height="30" class="ms-3">
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>