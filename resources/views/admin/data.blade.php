@include("templates.header")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-dark">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Mobil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-body">
            <div class="container">
              <div class="row justify-content-center mb-3">
                <div class="col-lg-12">
                  <form action="/data" method="post">
                    <div class="form-group d-flex justify-content-evenly">
                      <input type="text" placeholder="Cari Data" name="search" class="form-control rounded-0" aria-describedby="Search Bar">
                      <input type="hidden" value="{{csrf_token()}}" name="_token">
                      <button type="submit" class="btn btn-light rounded-0"><i class="fas fa-search"></i></button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                @foreach($cars as $car)
                  <div class="col-lg-12">
                    <div class="card bg-dark">
                      <img src="{{asset("storage/pictures/$car->gambar")}}"
                           class="card-img-top"
                           alt="gambar-mobil">
                      <div class="card-body">
                        <h2 class="card-title mb-3">{{$car->merk}}</h2>
                        <p class="card-text">Type : {{$car->type}}</p>
                        <p class="card-text">Harga : Rp. {{number_format($car->harga)}}</p>
                        <p class="card-text">Harga Fullday : Rp. {{number_format($car->harga_fullday)}}</p>
                        <p class="card-text">Transmisi : {{$car->transmisi}}</p>
                        <p class="card-text">Deskripsi : {{$car->deskripsi}}</p>
                        <div class="row justify-content-start">
                          <div class="col-sm-12">
                            <a href="{{route("update", $car->id_mobil)}}">
                            <button type="button"
                                    class="btn btn-warning"><i class="fas fa-recycle"></i> Update
                            </button>
                            </a>
                            <a href="{{route("delete", $car->id_mobil)}}">
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-eraser"></i>
                                Delete
                              </button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h6>&copy; 2022 ArhamTrans.com</h6>
      </div>
    </div>
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModal">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-dark">Data Berhasil DiHapus</p>
      </div>
    </div>
  </div>
</div>
@include("templates.footer")

