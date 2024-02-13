
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Foto Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">


              <!-- General Form Elements -->
             
              <form action="<?= base_url('home/aksi_ubah_foto')?>" method="post" enctype="multipart/form-data">
        <label for="foto">Pilih Foto Profil Baru:</label><br>
        <input type="file" id="foto" name="foto" accept="image/*"><br><br>

        <input type="hidden" name="id" value="<?=$darren->id_user?>">
        <input type="submit" value="Simpan Perubahan">
    </form>

            </div>
          </div>

        </div>

       
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


