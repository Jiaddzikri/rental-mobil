@include("templates.header")

<div class="content-wrapper bg-dark">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h1 class="m-0">List Services</h1>
        </div><!-- /.col -->
        <div class="col-lg6 col-md-6 col-sm-6">
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
              <div class="row justify-content-center align-items-center">
                @foreach($dataServices as $data)
                  <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                    <div class="card"
                         style="min-height: 23rem">
                      <div class="card-body text-dark">
                        <h4 class="card-title"><i class="{{$data->icon}}"
                                                  style="font-size: 4rem"></i></h4>
                        <h6 class="card-subtitle mb-2 mt-5 text-muted">{{$data->title}}</h6>
                        <p class="card-text">{{$data->deskripsi}}</p>
                        <a class="services-update-button"
                           href="/admin/services/update"
                           data-id="{{$data->id}}">
                          <button type="button"
                                  class="btn btn-primary mr-3"
                                  data-toggle="modal"
                                  data-target="#updateServicesModal"><i class="fas fa-recycle"></i>
                            Update
                          </button>
                        </a>
                        <a href="">
                          <button type="button"
                                  class="btn btn-danger"
                                  data-toggle="modal"
                                  data-target="#deleteServicesModal"><i class="fas fa-eraser"></i>
                            Delete
                          </button>
                        </a>
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

<div class="modal fade"
     id="updateServicesModal"
     tabindex="-1"
     aria-labelledby="updateServicesModal"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark"
            id="exampleModal">Message</h5>
        <button type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="text-dark">
          <div class="form-group">
            <label for="updateIcon">Icon</label>
            <input type="text"
                   class="form-control update-icon-services"
                   id="updateIcon"
                   aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="updateTitle">Title</label>
            <input type="text"
                   class="form-control update-title-services"
                   id="updateTitle">
          </div>
          <div class="form-group">
            <label for="updateDescription">Services Description</label>
            <textarea class="form-control update-description-services"
                      id="updateDescription"
                      rows="3"></textarea>
          </div>
          <button type="submit"
                  class="btn btn-primary">Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade"
     id="deleteServicesModal"
     tabindex="-1"
     aria-labelledby="deleteServicesModal"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark"
            id="exampleModal">Message</h5>
        <button type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close">
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

