<div id="app">
    <section class="section">
      <div class="container  mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand mb-5">
                <h4>SIPERKUL</h4>
            </div>

            <div class="card card-primary">
              <div class="card-body">
              <?= $this->session->flashdata('pesan') ?>
                <form method="POST" action="<?= base_url('Guest/auth')?>">
                  <div class="form-group">
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" autocomplete="off" placeholder="Username">
                    <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Password">
                    <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Sistem Perencanaan Perkuliahan 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>