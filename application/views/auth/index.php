<div class="container col-lg-6">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                <img src="<?= base_url('assets/img/Logo_BNN.png') ?>" width="200px" margin-left="30%" style="margin-left: 27%" class="mb-5">
                <?= $this->session->flashdata('message'); ?>

                <form class="user" action="<?= base_url('auth') ?>" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>