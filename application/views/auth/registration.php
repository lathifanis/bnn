<div class="container col-lg-5">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">

        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
            </div>
            <form class="user" action="<?= base_url('auth/registration') ?>" method="post">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '
                </small>') ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="pass1" name="pass1" placeholder="Password">
                  <?= form_error('pass1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="pass2" name="pass2" placeholder="Repeat Password">
                </div>
              </div>
              <button type="submit" href="<?= base_url() ?>auth" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="<?= base_url() ?>auth">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>