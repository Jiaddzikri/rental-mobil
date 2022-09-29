@include("templates.userHeader")

<div class="container">
  <div class="row mt-5">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h2 class="text-center">Daftar Mobil Yang Tersedia</h2>
    </div>
  </div>
  <div class="row mt-5 justify-content-center align-items-center">
    @foreach($dataMobil as $data)
      <div class="col-lg-4 col-md-4 col-sm-12 mb-5 d-flex justify-content-center">
        <div class="card overflow-hidden list-card-wrapper"
             style="width: 20rem;">
          <img src="{{asset("storage/pictures/$data->gambar")}}"
               class="card-img-top"
               alt="..." style="width: 100%">
          <div class="card-body card-list-body">
            <h5 class="card-title mb-1">{{$data->merk}}</h5>
            <h6 class="card-title mb-1">{{$data->type}}</h6>
            <p class="card-text mb-0">Harga: Rp. {{number_format($data->harga)}}</p>
            <p class="card-text mb-1">Harga Fullday: Rp. {{number_format($data->harga_fullday)}}</p>
            <small class="card-text text-center">*Harga Belum Termasuk Bensin, Parkir, Tol.</small>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@include("templates.userFooter")
