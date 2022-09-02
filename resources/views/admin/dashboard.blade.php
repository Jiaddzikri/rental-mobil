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
                <div class="col-lg-6">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>150</h3>
                      <p>Jumlah Pengunjung</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$total_data}}</h3>
                      <p>Jumlah Mobil</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-car"></i>
                    </div>
                    <a href="#" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
                <ul class="list-group">
                    <li class="list-group-item bg-light p-4">
                      <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center flex-column">
                          <h3>Lokasi  <i class="fas fa-map"></i></h3>
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2338917370597!2d107.82469220820825!3d-6.898309998837889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x696b34f2e72ec6d6!2zNsKwNTMnNTMuOSJTIDEwN8KwNDknMzIuNyJF!5e0!3m2!1sid!2sid!4v1662132603665!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                      </div>
                    </li>
                </ul>
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

@include("templates.footer")
