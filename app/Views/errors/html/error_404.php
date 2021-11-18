<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>404 Page Not Found</title>
	<link rel="shortcut icon" type="image/png" href="/faviconnn.ico" />
    <!--CSS-->
    <link href="/css/styles.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="layoutError">
        <div id="layoutError_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mt-4">
                                <img class="mb-4 img-error" src="/assets/img/error/error-404.svg" />
                                <p class="lead">
                                    <?php if (!empty($message) && $message !== '(null)') : ?>
                                        <?= esc($message) ?>
                                    <?php else : ?>
                                        This requested URL was not found on this server.
                                    <?php endif ?>
                                </p>
                                <a href="/">
                                    <i class="fas fa-arrow-left mr-1"></i>
                                    Return to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
</body>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex justify-content-center small">
            <div class="text-muted">Copyright &copy; Warteg Bahari UMN 2021</div>
        </div>
    </div>
</footer>

<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/js/datatables.js"></script>
</html>