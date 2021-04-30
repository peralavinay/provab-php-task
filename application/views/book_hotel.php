<?php 
// print_r($_SESSION);
// $json = file_get_contents('./images/hotelAvailability_Response (2).json');
//         $obj  = json_decode($json, true);
//         $data = $obj['result'];
// 		foreach ($data as $a) {
//             if($a['hotel_id']=='257694')
//             {
//                 print_r($a);
//             }
//         }
// print_r($hotel);
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

    <title></title>
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
                <h1>Hotel details</h1>
                <table>
                <?php //if(!empty($hotel)) {foreach($hotel as $hotel) {?>
                    <tr>
                        <th>Hotel Name</th>
                        <td><?= $hotel['hotel_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Addresss</th>
                        <td><?= $hotel['address'] ?></td>
                    </tr>
                    <tr>
                        <th>Stars</th>
                        <td><?= $hotel['stars'] ?></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><?= $hotel['price'] ?></td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img src='<?= $hotel['photo'] ?>' class= "rounded" ></td>
                    </tr>
                    <tr>
                        <th>Hotel Currency Code</th>
                        <td><?= $hotel['hotel_currency_code'] ?></td>
                    </tr>
                    <tr>
                        <th>Hotel ID</th>
                        <td><?= $hotel['hotel_id'] ?></td>
                    </tr>

                    <tr>
                        <th>Hotel amenities</th>
                        <td><?php foreach($hotel['hotel_amenities'] as $a) { echo $a."<br>"; }?></td>
                    </tr>
                    <?php // } } ?>
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