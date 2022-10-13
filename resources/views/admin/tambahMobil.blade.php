@include("templates.header")

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
          <div class="card card-dark elevation-3">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Mobil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/data/tambah"
                  method="post"
                  enctype="multipart/form-data">

              <div class="card-body">
                @if ($message["success"])
                  <div class="alert alert-success mt-1"
                       role="alert">
                    Data Berhasil ditambah
                  </div>
                @endif
                <div class="form-group">
                  <label class="text-dark font-weight-normal" for="brand">Brand</label>
                  <input name="brand"
                         type="text"
                         class="form-control"
                         id="brand"
                         placeholder="{{old("brand") ?? "Brand"}}"
                         value="{{old("brand")}}" autocomplete="off">
                  @error("brand")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-dark font-weight-normal" for="type">Type Mobil</label>
                  <input name="type"
                         type="text"
                         class="form-control"
                         id="type"
                         placeholder="{{old("type") ?? "Type"}}"
                         value="{{old("type")}}" autocomplete="off">
                  @error("type")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-dark font-weight-normal" for="type">Harga</label>
                  <input name="harga"
                         type="number"
                         class="form-control"
                         id="type"
                         placeholder="{{old("harga") ?? "Harga"}}"
                         value="{{old("harga")}}" autocomplete="off">
                  @error("harga")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-dark font-weight-normal" for="type">Harga Fullday</label>
                  <input name="harga_fullday"
                         type="number"
                         class="form-control"
                         id="type"
                         placeholder="{{old("harga_fullday") ?? "Harga Fullday"}}"
                         value="{{old("harga_fullday")}}" autocomplete="off">
                  @error("harga_fullday")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <select name="transmisi"
                          class="custom-select form-control-border"
                          id="transmisi">
                    <option value="">Transmisi...</option>
                    <option>MT</option>
                    <option>AT</option>
                    <option>MT/AT</option>
                  </select>
                  @error("transmisi")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group mb-4">
                  <label class="text-dark font-weight-normal">Deskripsi</label>
                  <textarea name="deskripsi"
                            class="form-control"
                            rows="3"
                            placeholder="{{old("deskripsi") ?? "deskripsi"}}">{{old("deskripsi")}}</textarea>
                  @error("deskripsi")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file"
                           name="gambar"
                           class="custom-file-input admin-image-input"
                           id="inputGroupFile01"
                           aria-describedby="inputGroupFileAddon01" autocomplete="off" onchange="imagePreview()">
                    <label class="custom-file-label admin-image-label"
                           for="inputGroupFile01">Pilih Gambar Mobil...</label>
                  </div>
                  @error("gambar")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                  <img class="admin-image-preview" src="{{asset("admin_assets/dist/img/default.jpg")}}"
                       alt="" style="width: 15rem; height: 10rem">
              </div>
              <input type="hidden"
                     name="_token"
                     value="{{csrf_token()}}">
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit"
                        class="btn btn-primary">Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>


@include("templates.footer")
