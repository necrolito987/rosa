<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>QR Code Generator Using Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <!-- QR Code Form -->
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">QR Code Generator Using Ajax</h5>
                    </div>
                    <div class="card-body">
                        <form action="qrcode.php" class="form">
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Task Title" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="codigo" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="url" id="url" placeholder="any text">
                            </div>
                            <button class="btn btn-primary btn-block" value="refresh">QR Code Generator</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /QR Code Form -->

        <!-- QR Code Wrapper-->
        <div class="row mt-2">
            <div class="col-lg-6 offset-lg-3">
                <div class="status"></div>
                <div id="d-qrcode" class="d-none text-center">
                </div>
                <div class="box mt-2 d-none text-center">
                    <a href="#" class="btn btn-info" id="show" download>Download QR Code</a>
                </div>
            </div>
        </div>
        <!-- /QR Code Wrapper -->
    </div>
    <div>
        <main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>    
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Created At</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM user";
          $result_tasks = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['image']; ?></td>
            <td><?php echo $row['dato']; ?></td>
            <td><?php echo $row['codigo']; ?></td>
            <td>
                <img src="<?php echo $row['image']; ?>" />
            </td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
    </div>

    <!-- QR Code Javascript library -->
    <script src="asset/qrcode.min.js"></script>
    <!-- /QR Code Javascript library -->
    <script src="asset/script.js"></script>

</body>

</html>