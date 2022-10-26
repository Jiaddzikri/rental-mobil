@include("templates.userHeader")

<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
      <h2 class="text-center mt-5">Daftar Mobil Yang Tersedia</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-12 col-sm-12">
      <div class="row mt-5 justify-content-center align-items-center">
        @foreach($dataMobil as $data)
          <div class="col-lg-4 col-md-6 col-sm-12 mb-5 d-flex justify-content-center">
            <div class="card overflow-hidden list-card-wrapper"
                 style="width: 20rem;">
              <img src="{{asset("storage/pictures/$data->gambar")}}"
                   class="card-img-top"
                   alt="..." style="width: 100%">
              <div class="card-body card-list-body">
                <h5 class="card-title mb-1"><i class="fas fa-car"></i> {{$data->merk}}</h5>
                <h6 class="card-title mb-1">{{$data->type}}</h6>
                <p class="card-text mb-0"><i class="fas fa-circle-dollar-to-slot"></i> Harga: Rp. {{number_format($data->harga)}}</p>
                <p class="card-text mb-1"><i class="fas fa-circle-dollar-to-slot"></i> Harga Fullday: Rp. {{number_format($data->harga_fullday)}}</p>
                <p class="card-text mb-1"><i class="fa-brands fa-whatsapp-square"></i> Minat? Silahkan Hubungi: 0895344755555</p>
                <small class="card-text text-center">*Harga Belum Termasuk Bensin, Parkir, Tol.</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@include("templates.userFooter")
