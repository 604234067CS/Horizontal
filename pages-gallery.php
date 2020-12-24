<?php include 'layouts/header.php'; ?>

<!--Magnific Popup CSS -->
<link rel="stylesheet" href="public/assets/plugins/magnific-popup/magnific-popup.css">

<link href="public/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

<?php include 'layouts/headerStyle.php'; ?>

<body>

    <?php include 'layouts/loader.php'; ?>

    <?php include 'layouts/navbar.php'; ?>

    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                <li class="breadcrumb-item active">File Uploads</li>
                            </ol>
                        </div>
                        <h4 class="page-title">File Uploads</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Dropzone</h4>
                            <p class="text-muted m-b-30 font-14">DropzoneJS is an open source library
                                that provides drag’n’drop file uploads with image previews.
                            </p>

                            <div class="m-b-30">
                                <form action="ConnectData/pages-gallery-db.php" class="dropzone" id="frmTarget" method="post" enctype="multipart/form-data">
                                    <div class="fallback">
                                        <input name="file_name" id="file_name" type="file" multiple>
                                    </div>
                                </form>
                            </div>

                            <div class="text-center m-t-15">
                                <input type="submit" id="startUpload" name="button" class="btn btn-primary waves-effect waves-light" value="Upload">
                                <input type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" value="CLOSE" onClick="javascript:location.reload();">
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item active">Gallery</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Gallery</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                        <div class="project-item">
                           
                                    <div class="ligthbox"   >
                                        <?php
                                        // Include the database configuration file 
                                        require 'ConnectData/pages-gallery-connectdb.php';
                                        // Get files from the database 
                                        $query = "SELECT * FROM files ORDER BY id DESC";
                                        $insert = mysqli_query($conn, $query);

                                        if ($insert->num_rows > 0) {
                                            while ($row = $insert->fetch_assoc()) {
                                                $filePath = 'public/assets/images/gallery/' . $row["file_name"];
                                                $fileMime = mime_content_type($filePath);
                                        ?>
                                                <embed src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" width="350px" height="240px" />
                                            <?php }
                                        } else { ?>
                                            <p>No file(s) found...</p>
                                        <?php } ?>
                                    </div>
                        </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <?php include 'layouts/footer.php'; ?>

    <?php include 'layouts/footerScript.php'; ?>

    <!-- Magnific Popup -->
    <script src="public/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>


    <!-- Dropzone js -->
    <script src="public/assets/plugins/dropzone/dist/dropzone.js"></script>

    <!-- Ajax js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- App js -->
    <script src="public/assets/js/app.js"></script>

    <script>
        Dropzone.autoDiscover = false;
        $(function() {
            //Dropzone class
            var myDropzone = new Dropzone(".dropzone", {
                url: "ConnectData/pages-gallery-db.php",
                paramName: "file_name",
                maxFilesize: 2,
                parallelUploads: 15,
                acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                autoProcessQueue: false
            });

            $('#startUpload').click(function() {
                myDropzone.processQueue();
            });
        });
    </script>

    <script type="text/javascript">
        $('.gallery-popup').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            }
        });
    </script>



</body>

</html>