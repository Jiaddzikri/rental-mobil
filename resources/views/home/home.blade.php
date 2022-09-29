@include("templates.userHeader")
<div class="container-fluid home-head-container overflow-hidden">
  <div class="row align-items-center justify-content-center row-header">
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="position-relative d-block text-header">
        <h1 class="text-head">Temukan Mobil Yang membuat anda nyaman.</h1>
        <p>Kami Menyewakan Mobil dengan harga yang bersahabat, serta sopir yang berpengalaman dengan harga yang
          bersahabat.</p>
        <button type="button"
                class="btn btn-primary home-header-button">List Mobil <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="d-block position-relative d-flex align-items-center justify-content-center main-image-container ">
        <img class="main-image"
             src="{{asset("user_assets/dist/img/gambar-mobil.png")}}"
             alt="">
      </div>
    </div>
  </div>
</div>

<div class="container-fluid home-container overflow-hidden mb-5">
  <div class="row">
    <div class="col text-center mt-5">
      <h1><i class="fas fa-hands-helping"></i> Layanan Kami</h1>
    </div>
  </div>
  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-lg-10 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
      <div class="row justify-content-center align-items-center">
        @foreach($servicesList as $data)
          <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
            <div class="card mt-4">
              <div class="card-body home-card">
                <h1 class="card-title text-center mb-4" style="font-size: 4rem"><i class="{{$data->icon}}"></i></h1>
                <h6 class="card-subtitle mb-2 text-muted">{{$data->title}}</h6>
                <p class="card-text">{{$data->deskripsi}}</p>
                <a href="#"
                   class="card-link">Card link</a>
                <a href="#"
                   class="card-link">Another link</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col text-center mt-5">
      <h1><i class="fas fa-map"></i> Temukan Kami</h1>
    </div>
  </div>
  <div class="row mt-5 justify-content-center align-items-center mb-5">
    <div class="col-lg-10 col-md-10 col-sm-10">
      <iframe class="map"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2338917370597!2d107.82469220820825!3d-6.898309998837889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x696b34f2e72ec6d6!2zNsKwNTMnNTMuOSJTIDEwN8KwNDknMzIuNyJF!5e0!3m2!1sid!2sid!4v1662132603665!5m2!1sid!2sid"
              width="100%"
              height="400"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>
@include("templates.userFooter")
