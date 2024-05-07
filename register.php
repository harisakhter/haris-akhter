<?php

  session_start();
  include('includes/header.php');
  include('includes/topbar.php');
  include('includes/sidebar.php');
  include('config/dbcon.php');
?>

<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="">Phone Number</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group">
          <label for="">Email Id</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
       
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
              </div>
          </div>
      </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addUser" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal End Add  -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="post">
      <div class="modal-body">
        <input type="hidden" name="delete_id" class="delete_user_id">
        <p>
          Are You Sure, You want to Delete this Data;
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes, Delete!</button>

      </div>
      </form>
    </div>
  </div>
</div>


<!-- Content Header -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Users</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  

  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <?php 
        
        if(isset($_SESSION['status']))
        {
          echo "<h4>" .$_SESSION['status']."</h4>";
          unset($_SESSION['status']);
        }
        ?>
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered User</h3>
                <a href=""  data-toggle="modal" data-target="#addUserModal" class="btn btn-primary btn-sm float-right">Add User</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Numb er</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                 <tr>
                  <th>1</th>
                  <th>Shamnoon</th>
                  <th>hk1223512@gmail.com</th>
                  <th>031216542</th>
                
                 <td>
                          <a href="edit.php?user_id=<?php echo $row['id']; ?>" class ='btn btn-info btn-sm'>
                              Edit</a>

                            <button type="button" value="<?php echo $row['id']; ?>" 
                             class ='btn btn-danger btn-sm deletebtn'>
                              Delete</button>
                              </td>  
                              
                </tr>
                  <tbody>
                    
                    <?php
                      $query = "SELECT * FROM users";
                      $sql = mysqli_query($conn, $query);


                      if(mysqli_num_rows($sql) > 0)
                      {
                        foreach($sql as $row)
                        {
                        ?>
                   
                
          
                        <tr>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['name']; ?></td>
                             <td><?php echo $row['email']; ?></td>
                             <td><?php echo $row['phone']; ?></td>
                             <td>
                          <a href="edit.php?user_id=<?php echo $row['id']; ?>" class ='btn btn-info btn-sm'>
                              Edit</a>

                            <button type="button" value="<?php echo $row['id']; ?>" 
                             class ='btn btn-danger btn-sm deletebtn'>
                              Delete</button>
                              </td>  
                              
                </tr>
                    
                       
                      
                          <?php
                        }
                      }
                      else
                      {
                       echo "NO Reecord Found";
                      }

                    ?>
                  </tbody>
                </table>
    </div>
    </div>

    </div>
          </div>
        </div>
        <section>
</div>

</div>
<?php
  include('includes/script.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
($_document).ready(function () {
    $('.deletebtn').click(function (e) { 
        e.preventDefault();
        var user_id = $(this).val();
        console.log();
        $('.delete_user_id').val(user_id);
        $('#deleteModal').modal('show');
    });
});
</script>

</script>




<?php
  include('includes/footer.php');
?>