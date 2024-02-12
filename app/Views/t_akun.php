

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Akun</h1>
     
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Akun</h5>

              <!-- General Form Elements -->
             
                <form action="<?= base_url('home/aksi_t_akun')?>" method="POST"> 
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                <input type="type" class="form-control" id="username" name="username">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                <input type="type" class="form-control" id="password" name="password" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                <input type="type" class="form-control" id="email" name="email" >
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

