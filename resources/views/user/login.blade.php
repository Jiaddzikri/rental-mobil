@include("templates.userHeader")

<div class="container-fluid d-flex align-items-center justify-content-center overflow-hidden position-relative">
  <div class="row justify-content-center align-items-center ">
    <div class="col-lg-12 d-flex justify-content-center align-items-center">
      <div class="login-wrapper position-relative overflow-hidden">
        <div class="row">
          <div class="col-sm-12 p-3 text-center">
            <h6><i class="fas fa-user-alt user-login-icon mt-3"></i></h6>
          </div>
        </div>
        <div class="row justify-content-center p-4">
          <div class="col-lg-10">
            <form action="{{route("postLogin")}}" method="post">
              <div class="form-group text-white">
                <label for="exampleInputEmail1"><i class="fas fa-user"></i> Username</label>
                <input type="text"
                       class="form-control login-form-control"
                       id="exampleInputEmail1"
                       aria-describedby="emailHelp">
                <div id="validationServer03Feedback" class="login-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <div class="form-group text-white">
                <label for="exampleInputPassword1"><i class="fas fa-key "></i> Password</label>
                <input type="password"
                       class="form-control login-form-control"
                       id="exampleInputPassword1">
                <div id="validationServer03Feedback" class=" login-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <button type="submit"
                      class="btn btn-primary login-btn mt-1">Submit
              </button>
            </form>
          </div>
        </div>
        <div class="wave-container">
          <div class="wave"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-circle">
  </div>
</div>


@include("templates.userFooter")
