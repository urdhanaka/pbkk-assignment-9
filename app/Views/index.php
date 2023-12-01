<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="m-4">
      <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/user/create') ?>" class="btn btn-success mb-2">Add User</a>
      </div>
      <?php
        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
        }
        ?>
      <div class="mt-3">
        <table class="table table-bordered table-striped table-hover" id="user">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>No HP</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if($user) : ?>
                <?php foreach($user as $row): ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td>
                  <a href="<?php echo site_url('/user/edit/'.$row['id']);?>" class="btn btn-primary">Edit</a>
                  <a href="<?php echo site_url('/user/delete/'.$row['id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                </td>
              </tr>
                <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4">No Data Found</td>
            </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready( function () {
          $('#user').DataTable();
        } );
        </script>
        </body>
        </html>
