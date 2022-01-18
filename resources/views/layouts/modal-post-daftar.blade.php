@if (!empty(Session::get('code')) && Session::get('code') == "modalPostDaftar")
    <script>
        $(function(){
            $('#modalPostDaftar').modal('show');
        });
    </script>
@endif

    <div class="modal fade" id="modalPostDaftar" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content py-5 px-5" style="background-color: #EFD692; border-radius: 10px">
                <div class="modal-body text-center">
                    @if (!empty(Session::get('jenis')) && Session::get('jenis') == "gagal")
                        <h4 class="text-uppercase fw-bold mb-3">Maaf, kamu sudah mendaftar program ini sebelumnya 😉</h4>
                    @else                        
                        <h4 class="text-uppercase fw-bold mb-3">selamat! pendaftaran kamu telah berhasil 😄</h4>
                        @if (!empty(Session::get('jenis')) && Session::get('jenis') == "internship")
                            <h6 class="text-uppercase">*silahkan cek email secara berkala untuk informasi lebih lanjut</h6>
                        @elseif(!empty(Session::get('jenis')) && Session::get('jenis') == "webinar")
                            <h6 class="text-uppercase">*silahkan cek email secara berkala untuk mengakses link zoom dan untuk masuk ke grup peserta</h6>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>