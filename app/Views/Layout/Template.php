<?php $this->load->view('header'); ?>
<!-- ini untuk memanggil file header.php, untuk memanggil file yang lain silahkan
sesuaikan nama filenya yang ada di dalam kurung -->

<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('Layout/Header'); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= view('Layout/Sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= view('Layout/Navbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php $this->renderSelection('Layout/Content'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= view('Layout/Footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <?php $this->load->view('js'); ?>

</body>

</html>