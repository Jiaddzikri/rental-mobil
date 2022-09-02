@include("templates.header")

<div class="content-wrapper bg-dark">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Update Data Mobil</h1>
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
          <div class="card">
            <div class="card-body bg-light">
              @if ($message["success"])
                <div class="alert alert-success mt-1"
                     role="alert">
                  Data Berhasil diubah
                </div>
              @endif
              <form action="{{route("postUpdate")}}" method="post" enctype="multipart/form-data">
                @foreach($cars as $car)
                  <div class="form-group">
                    <input type="hidden"
                           placeholder="{{$car->id_mobil}}"
                           value="{{$car->id_mobil}}"
                           class="form-control"
                           id="id"
                           aria-describedby="brand-update" name="id_mobil">
                  </div>
                  <div class="form-group">
                    <label class="text-dark font-weight-normal"
                           for="brand">Brand</label>
                    <input type="text"
                           value="{{$car->merk}}"
                           placeholder="{{$car->merk}}"
                           class="form-control"
                           id="brand"
                           aria-describedby="brand-update" name="brand">
                    @error("brand")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="text-dark font-weight-normal"
                           for="type">Type</label>
                    <input type="text"
                           value="{{$car->type}}"
                           placeholder="{{$car->type}}"
                           class="form-control"
                           id="type" name="type">
                    @error("type")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="text-dark font-weight-normal"
                           for="type">Harga</label>
                    <input type="text"
                           value="{{$car->harga}}"
                           placeholder="{{$car->harga}}"
                           class="form-control"
                           id="type" name="harga">
                    @error("harga")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="text-dark font-weight-normal"
                           for="type">Harga Fullday</label>
                    <input type="text"
                           value="{{$car->harga_fullday}}"
                           placeholder="{{$car->harga_fullday}}"
                           class="form-control"
                           id="type" name="harga_fullday">
                    @error("harga_fullday")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="form-group"><select name="transmisi"
                                                  class="custom-select form-control-border"
                                                  id="transmisi">
                      <option value="{{$car->transmisi}}">{{$car->transmisi}}</option>
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
                              rows="3">{{$car->deskripsi}}</textarea>
                    @error("deskripsi")
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                  </div>
                  <div class="form-group">
                    <div class="custom-file">
                      <input type="file"
                             name="gambar"
                             class="custom-file-input"
                             id="inputGroupFile01"
                             aria-describedby="inputGroupFileAddon01"
                             autocomplete="off"
                             value="{{$car->gambar}}">
                      <label class="custom-file-label"
                             for="inputGroupFile01">{{$car->gambar}}</label>
                      @error("gambar")
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <input type="hidden" name="hidden_gambar" value="{{$car->gambar}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endforeach
                    <button type="submit"
                            class="btn btn-primary mt-3">Submit
                    </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>


@include("templates.footer")
