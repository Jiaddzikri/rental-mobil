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
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card card-dark elevation-3">
            <div class="card-header">
              <h3 class="card-title">Tambah Services</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/admin/services"
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
                  <!-- Button trigger modal -->
                  <button type="button"
                          class="btn btn-primary"
                          data-toggle="modal"
                          data-target="#exampleModal">
                    <i class="fas fa-icons"></i>
                    Icon List
                  </button>
                </div>
                <div class="form-group">
                  <label class="text-dark font-weight-normal"
                         for="brand">Icon</label>
                  <input name="icon"
                         type="text"
                         class="form-control"
                         id="brand"
                         placeholder="{{old("icon") ?? "Icon"}}"
                         value="{{old("icon")}}"
                         autocomplete="off">
                  @error("icon")
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-dark font-weight-normal"
                         for="type">Title</label>
                  <input name="title"
                         type="text"
                         class="form-control"
                         id="type"
                         placeholder="{{old("title") ?? "Title"}}"
                         value="{{old("title")}}"
                         autocomplete="off">
                  @error("title")
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
              </div>
              <input type="hidden"
                     name="_token"
                     value="{{csrf_token()}}">
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit"
                        class="btn btn-primary"><i class="fas fa-upload"></i> Submit
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
<div class="modal fade"
     id="exampleModal"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"
            id="exampleModalLabel">Modal title</h5>
        <button type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body overflow-scroll">
        <table class="table text-dark">
          <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Icon Preview</th>
            <th scope="col">Kode</th>
            <th scope="col">Handle</th>
          </tr>
          </thead>
          <tbody>
          @foreach($icons as $icon)
          <tr>
            <th scope="row">1</th>
            <td><i class="{{$icon->kode_icon}}"></i></td>
            <td>{{$icon->kode_icon}}</td>
            <td>@mdo</td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button"
                class="btn btn-secondary"
                data-dismiss="modal">Close
        </button>
        <button type="button"
                class="btn btn-primary">Save changes
        </button>
      </div>
    </div>
  </div>
</div>
@include("templates.footer")
