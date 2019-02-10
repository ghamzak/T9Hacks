<?php
$servername = "localhost";
$username = "root";
$password = "root";
$databasename = "T9Hacks";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET["id"];
// echo "Connected successfully";
$stmt = $conn->prepare('SELECT * FROM `products` WHERE `id` = ?');
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) echo "No rows";
while($row = $result->fetch_assoc()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <style>
  .checked {
    color: orange;
  }

  .fa-thumbs-up , .fa-thumbs-down {
    padding: 0px 5px 0px 5px;
    cursor: pointer;
    user-select: none;
    float:right;
  }

  .fa-thumbs-up:hover{
    color: green;
  }

  .fa-thumbs-down:hover{
    color: red;
  }

  .fa-thumbs-up > span, .fa-thumbs-dow > span{
    padding: 0px 5px 0px 5px;
  }
  </style>
</head>
<body style="background:#76b852;">

<div class="container" style="padding:8% 0 0; margin:auto; ">
  <div class="row text-white">
    <div class="col-md-5">
      <img src="<?php echo $row["image"]?>"class="rounded" alt="Cinque Terre" width="400" height="300" />
    </div>
    <div class="col-md-4">
      <h1>
        <?php echo $row["name"]?>
      </h1>
      <p class="text-justify">
      <?php echo $row["description"]?>
      </p>
    </div>
    <div class="col-md-3">
      Price: <span><?php echo $row["price"]?></span>
    </div>
  </div>
  <div class="row"  style="padding:50px 0 0;">
    <div class="col-md-5">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="col-md-7">
    </div>
  </div>
  <div class="row"  style="padding:50px 0 0;">
    <div id="accordion" class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#collapseOne">
            Sepideh Goodarzy
          </a>
          <i onclick="myFunction(this)" class="fa fa-thumbs-down"><span>0</span></i>
          <i onclick="myFunction(this)" class="fa fa-thumbs-up"><span>40</span></i>
        </div>
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum..
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            Maziyar Nazari
          </a>
          <!-- Use an element to toggle between a like/dislike icon -->
          <i onclick="myFunction(this)" class="fa fa-thumbs-down"><span>0</span></i>
          <i onclick="myFunction(this)" class="fa fa-thumbs-up"><span>40</span></i>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum..
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
            Ghazaleh Kazeminejad
          </a>
          <i onclick="myFunction(this)" class="fa fa-thumbs-down"><span>0</span></i>
          <i onclick="myFunction(this)" class="fa fa-thumbs-up"><span>40</span></i>
        </div>
        <div id="collapseThree" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Lorem ipsum..
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
</script>
</body>
</html>
<?php
}
$stmt->close();
$conn->close();
?>
