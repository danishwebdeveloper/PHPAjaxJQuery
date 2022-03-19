<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="mb-3">
    <label for="fullname" class="form-label">Your Full Name</label>
    <input type="text" class="form-control" id="fullname" placeholder="Full Name">
  </div>
  <div class="mb-3">
    <label for="useremail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="useremail" placeholder="Email">
  </div>
  <div class="mb-3">
    <label for="mobile" class="form-label">mobile</label>
    <input type="text" class="form-control" id="mobile" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="palce" class="form-label">Place</label>
    <input type="text" class="form-control" id="place" aria-describedby="emailHelp">
  </div>
  
  </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" onclick="addUser()">Save changes</button>  
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="mb-3">
    <label for="updatename" class="form-label">Your Full Name</label>
    <input type="text" class="form-control" id="updatename" placeholder="Full Name">
  </div>
  <div class="mb-3">
    <label for="updateemail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="updateemail" placeholder="Email">
  </div>
  <div class="mb-3">
    <label for="updatemobile" class="form-label">mobile</label>
    <input type="text" class="form-control" id="updatemobile" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="updatepalce" class="form-label">Place</label>
    <input type="text" class="form-control" id="updateplace" aria-describedby="emailHelp">
  </div>
  
  </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" onclick="updateUser()">Update</button>  
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <input type="hidden" id="hiddenData" />
      </div>
    </div>
  </div>
</div>
    <div class="container my-3">
        <h2 class="text-center">PHP CRUD using jQuery AJAX</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateModal">
  Add New User
</button>
<div id="displayData">

</div>
</div>



    <!-- <button id="firstP">click me</button>
    <div id="para"></div> -->

    <!-- <script>
       var first = document.getElementById('firstP');
       var para = document.getElementById('para');
       first.addEventListener('click', ()=>{
        var newp = document.createElement('p');
        newp.innerHTML = "This is a text";
        para.appendChild(newp);
       })
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

    <script>
// when click use Ajax request to store data
// $(document).ready(function(e){
//     e.preventDefault;

$(document).ready(function(){
  displayRecord();  // whenever the dataloaded, it will dispaly records
})

function displayRecord(){
  var displayRecord = "true";
$.ajax({
  type: "post",
  url: "display.php",
  data : {
      displayDa : displayRecord,
  },
  success: function (data, status) {
      $('#displayData').html(data);
  },
  error: function(){ 
      console.log('failure');
   }
});
}

function addUser(){
    var fullname = $('#fullname').val();
    var useremail = $('#useremail').val();
    var mobile = $('#mobile').val();
    var place = $('#place').val();

    // var senddata = ;

    $.ajax({
        type: "post",
        url: "insert.php",
        data:  {
        sendName : fullname,
        sendEmail : useremail,
        sendMobile : mobile,
        sendPlace : place,
    },
        success: function (response) {
            // console.log('success')
            $('#completeModal').modal('hide');
            displayRecord();
        },
        error: function(){
            alert('error');
        }
    });
}

// Delete User
function deleteUser(deleteId){
  // console.log('here')
    $.ajax({
      url: "delete.php",
      type: "post",
      data: {
        deleteidSend: deleteId,
      },
      success: function (response) {
        $('#completeModal').modal('hide');
          displayRecord();
      },
      error:function(){
        alert('error while deleting');
      }
    });
}

// dispaly Model
function updateDetail(updateshowID){
  // console.log(updateshowID)
   $('#hiddenData').val(updateshowID);

   $.ajax({
     type: "post",
     url: "update.php",
     data: {
      updateshowID:updateshowID
     },
     success: function (response) {
        var userid = JSON.parse(response);
        $('#updatename').val(userid.fullname);
        $('#updateemail').val(userid.email);
        $('#updatemobile').val(userid.mobile);
        $('#updateplace').val(userid.place);
     }

   });
    // $.post('update.php',{updateshowID:updateshowID},function(userid,status){
    //   console.log(userid)
    //     // Take all data and convert it into the JSON object
    //     // var userid=JSON.parse(data);
    //     $('#updatename').val(userid.fullname);
    //     $('#updateemail').val(userid.email);
    //     $('#updatemobile').val(userid.mobile);
    //     $('#updateplace').val(userid.place);
    // });
    $('#UpdateModal').modal('show');
}

// update record in DB
function updateUser(){
       var sendName = $('#updatename').val();
       var sendEmail = $('#updateemail').val();
       var sendMobile = $('#updatemobile').val();
       var sendPlace = $('#updateplace').val();
       var hiddenData = $('#hiddenData').val();

      //  Use Ajax or just $.post 
      $.post('update.php', {
        sendName:sendName,
        sendEmail:sendEmail,
        sendMobile:sendMobile,
        sendPlace: sendPlace,
        hiddenData: hiddenData,
      },
      function(data, status){
        $('#UpdateModal').modal('hide');
        displayRecord();
      }
      )

}
// });
    </script>
</body>

</html>