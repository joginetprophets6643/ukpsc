<div class="content-wrapper">

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark"><?= trans('dashboard') ?></h1>

      </div>

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#"><?= trans('home') ?></a></li>

          <li class="breadcrumb-item active"><?= trans('dashboard') ?></li>

        </ol>

      </div>

    </div>

  </div>

</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <section class="col-md-12 connectedSortable">

        <div class="card">

          <div class="card-body d-flex p-0">

            <h3 class="card-title p-3">

              <i class="fa fa-pie-chart mr-1"></i>

              <?= trans('sales') ?>

            </h3>
            <ul class="nav nav-pills ml-auto p-2">

              <li class="nav-item">

                <a class="nav-link active" href="<?php echo base_url("admin/profile/consent_user") ?>" >View Consent</a>
              

              </li>

             

            </ul>
          </div>
        </div>
      </section>
    </div>

  </div>

</section>

</div>

<!-- Morris.js charts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<script src="<?= base_url() ?>assets/plugins/morris/morris.min.js"></script>

<!-- Sparkline -->

<script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- jvectormap -->

<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- jQuery Knob Chart -->

<script src="<?= base_url() ?>assets/plugins/knob/jquery.knob.js"></script>

<!-- daterangepicker -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->

<script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- Bootstrap WYSIHTML5 -->

<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>

