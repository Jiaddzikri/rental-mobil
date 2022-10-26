@include("templates.userHeader")

<div class="container-fluid position-relative login-container d-flex justify-content-center align-items-center">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="login-background-square position-relative d-flex justify-content-center align-items-center">
        <div class="login-wrapper position-absolute">
          <div class="row justify-content-center position-relative align-items-center">
            <div class="col-lg-2 col-md-2 col-sm-2 mt-5 logo-wrapper">
              <i class="fas fa-user login-logo"></i>
            </div>
          </div>
          <form action="/login"
                method="post"
                enctype="multipart/form-data">
            <div class="row justify-content-evenly flex-column align-items-center field-wrapper">
              <div class="col-lg-10 col-md-10 col-sm-10 mt-5">
                <div class="form-group">
                  <input type="text"
                         class="form-control form-field-control"
                         placeholder="Username"
                         name="username" autocomplete="off">
                </div>
                <div class="feedback d-flex justify-content-between align-items-center position-relative mt-2">
                  @error("username")
                  <div class="login-feedback position-absolute">
                    {{$message}}
                  </div>
                  @enderror

                  @if($feedback["failed"]["username"])
                    <div class="login-feedback position-absolute">
                      {{$feedback["failed"]["username"]}}
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 mt-4">
                <div class="form-group d-flex justify-content-evenly align-items-center flex-wrap position-relative">
                  <input type="password"
                         class="form-control form-field-control"
                         placeholder="Password"
                         name="password">
                  <i class="fas fa-eye position-absolute show-hide-password"></i>
                </div>
                <div class="feedback d-flex justify-content-between align-items-center position-relative mt-2">
                  @error("password")
                  <div class="login-feedback position-absolute">
                    {{$message}}
                  </div>
                  @enderror

                  @if($feedback["failed"]["password"])
                    <div class="login-feedback position-absolute">
                      {{$feedback["failed"]["password"]}}
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col mt-4">
                <button type="submit"
                        class="btn btn-primary login-btn">Login
                </button>
                <input type="hidden"
                       name="_token"
                       value="{{csrf_token()}}">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@include("templates.userFooter")
