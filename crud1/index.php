<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Crud Ajax Ajquery </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="font-awesome.min.css">
    <link href="datatables.min.css" rel="stylesheet"/> 
    <link href="datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
  </head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"> <i class="fab fa-wolf-pack-battalion"></i> POLY LETA </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact </a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center text-danger font-weight-normal my-3"> CRUD Application Using PHP-OPP, PDO-MySQL, Ajax , DataTables et SweetAlert2</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4 class="mt-2 text-primary">All users in database </h4>
        </div> 
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"> <i class="fas fa-user-plus fa-lg"></i> &nbsp;&nbsp; Add New User </button>
            <a href="action.php?export=excel" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i> &nbsp; &nbsp; Export to Excel </a>
        </div>
    </div>
    <hr class="my-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id="showUser">
              <h3 class="text-center text-success" style="margin-top: 150px;">Chargement...</h3>
            </div>
        </div>
    </div>
</div>

  <!-- Ajouter un utilisateur -->
  <div class="modal" id="addModal" style="margin: top 50px;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un utilisateur </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body my-10">
         <form action="" method="POST" id="form-data">
            <div class="form-group">
                <input type="text" name="fname" id="" placeholder="First Name" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="lname" id="" placeholder="Last Name" required class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="" placeholder="Email" required class="form-control">
            </div>
            <div class="form-group">
                <input type="tel" name="phone" id="" placeholder="Phone" required class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="insert" id="insert" value="Ajoute un utilisateur" class="btn btn-primary btn-block">
            </div>
         </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Actualiser un utilisateur -->
  <div class="modal" id="editModal" style="margin: top 50px;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modifier un utilisateur </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body my-10">
         <form action="" method="POST" id="edit-form-data">
          <input type="hidden" name="id" id="id">
            <div class="form-group">
                <input type="text" name="fname" id="fname" required class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="lname" id="lname"  required class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email"  required class="form-control">
            </div>
            <div class="form-group">
                <input type="tel" name="phone" id="phone"  required class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="update" id="update" value="Modifier un utilisateur" class="btn btn-warning btn-block">
            </div>
         </form>
        </div>

      </div>
    </div>
  </div>

<!-- jQuery library -->
<script src="jquery.min.js"></script>
<!-- Popper JS -->
<!-- script src="popper.min.js" --></script>
<!-- Latest compiled JavaScript -->
<script src="bootstrap.bundle.min.js"></script>
<script src="datatables.min.js"></script>
<script src="sweetalert2@11"></script> 
<!-- script src="SimpleAjaxUploader.min.js" integrity="sha512-sF1OQUX4620btxfaKLxsFeu/euV3FcPyH+uST3mdEjc8vW8R4z1xNiZhcG7wcZQbFkgFhiiBoAyYNMCL3jufPA==" crossorigin="anonymous" referrerpolicy="no-referrer" --></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

<script>
    $(document).ready(function(){
        
        showAllUsers(); 
        function showAllUsers(){
            $.ajax({
                url: "action.php", 
                type: "POST", 
                data: {action:"view"}, 
                success:function(response){
                    //console.log(response);
                    $("#showUser").html(response); 
                    $("table").DataTable({
                      order : [0,'desc']
                    }); 
                }
            }); 
        }

        // Inserer Ajax
        $("#insert").click(function(e){
          if($("#form-data")[0].checkValidity()){
            e.preventDefault(); 
            $.ajax({
                url: "action.php", 
                type: "POST", 
                data: $("#form-data").serialize()+ "&action=insert",

                success: function(response){
                  Swal.fire({
                    title: 'user added successfully', 
                    type: 'success' 
                  }) 
                  $("#addModal").modal('hide'); 
                  $("#form-data")[0].reset(); 
                  showAllUsers(); 
                }
            }); 
          }
        }); 
        
        // Modifier User 

        $("body").on("click", " .editBtn", function(e){
          e.preventDefault(); 
          edit_id = $(this).attr('id'); 
          $.ajax({
            url: "action.php", 
            type: "POST", 
            data:{edit_id:edit_id},
            success: function(response){
              data = JSON.parse(response); 
              $("#id").val(data.id); 
              $("#fname").val(data.first_name);
              $("#lname").val(data.last_name);
              $("#email").val(data.email);
              $("#phone").val(data.phone);
            } 
          }); 
        }); 

        // Update Ajax
          $("#update").click(function(e){
          if($("#edit-form-data")[0].checkValidity()){
            e.preventDefault(); 
            $.ajax({
                url: "action.php", 
                type: "POST", 
                data: $("#edit-form-data").serialize()+"&action=update",

                success: function(response){
                  Swal.fire({
                    title: 'Updated user successfully', 
                    type: 'success' 
                  }) 

                  $("#editModal").modal('hide'); 
                  $("#edit-form-data")[0].reset(); 

                  showAllUsers(); 
                }
            }); 
          }
        }); 

        // Delete User 

        $('body').on("click", ".delBtn", function(e){
          e.preventDefault(); 
          var tr = $(this).closest('tr'); 
          del_id = $(this).attr('id'); 
          Swal.fire({
            title: "Etes-vous sûr ?", 
            text: "You won't be able to revert this !", 
            type: "warning", 
            showCancelButton: true, 
            confirmButtonColor: '#3085d6', 
            cancelButtonColor: '#d33', 
            confirmButtonText: 'Yes, delete it', 
          }).then((result) =>{
            if(result.value){
              $.ajax({
                url: "action.php", 
                type: "POST", 
                data: {del_id:del_id}, 
                success: function(response){
                  tr.css('background-color', '#ff6666'); 
                  Swal.fire(
                    'Deleted', 
                    'User deleted Successfully', 
                    'Success'
                  )
                  showAllUsers(); 
                }
              }); 
            }
          }); 
        });  

        // Afficher les details de l'utilisateur 

        $("body").on("click", ".infoBtn", function(e){
          e.preventDefault(e); 
          info_id = $(this).attr('id'); 
          $.ajax({
            url: "action.php", 
            type: "POST", 
            data:{info_id:info_id}, 
            success: function(response){
              // console.log(response);
              data = JSON.parse(response);
              Swal.fire({
                title: '<strong> User Info : ID (' +data.id+')</strong>', 
                type: 'info', 
                html: '<b>First Name :</b>'+data.first_name+'<br><b>Last Name : </b>'+data.last_name+'<br><b> Email : </b>'+data.email+'<br><b> Phone : </b>'+data.phone, 
                showCancelButton: true, 
              })  
            }
          }); 

        })
    }); 
</script>
</body>

</html>