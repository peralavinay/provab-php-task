<?php 
// print_r($_SESSION);
// die();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hotel Availability</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <?php if(isset($_SESSION['user_logged'])) { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php base_url()?>user">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php base_url()?>hotels">Hotels</a>
      </li>
    <?php } 
    else { ?>      
      <li class="nav-item">
        <a class="nav-link" href="<?php base_url()?>login">Login</a>
      </li>
      <?php } ?>
      
    </ul>
    <span class="float-right">
    <a class="nav-link" href="<?php base_url()?>auth/logout">Logout</a>
    </span>
  </div>
</nav>
      <div class="container">
            <div class="col-md-8">
                <h1>Hotel Availability</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Stars</th>
                            <th scope="col">Price</th>
                            <th scope="col">photo</th>
                            <th scope="col">Hotel Currency Code</th>
                            <th scope="col">Book</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($hotel)) {foreach($hotel as $row) {?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= $row['hotel_name'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['stars'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><img class="rounded table table-image" src='<?= $row['photo'] ?>' ></td>
                            <td><?= $row['hotel_currency_code'] ?></td>
                            <td>
                                <form method="POST" action="<?= base_url('home/book')?>">
                                    <input type="hidden" name="id" value="<?php echo $row['hotel_id'] ?>">
                                    <button type="submit" name="edit" class="btn btn-success">Book</button>
                                </form>
                            </td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            
            </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>