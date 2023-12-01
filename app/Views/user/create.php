<!DOCTYPE html>
<html>

<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form action="<?php echo site_url('/user/save') ?>" method="post" >
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>No. HP</label>
        <input type="text" name="no_hp" class="form-control" value="">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save Data</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
</body>

</html>
