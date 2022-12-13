<?php 
include("database/functions.php");

template_header('Home');

?>

<button type="button" onclick="location.href='highestRev.php'" class="btn btn-secondary btn-lg btn-block">Revenue for each booking</button>
<button type="button" onclick="location.href='penalty.php'" class="btn btn-secondary btn-lg btn-block">Highest penalty customer</button>
<button type="button" onclick="location.href='bookingsperuser.php'" class="btn btn-secondary btn-lg btn-block">Bookings for each customer</button>
<button type="button" onclick="location.href='cube.php'" class="btn btn-secondary btn-lg btn-block">Total number of bookings based on vehicle type and vehicle model</button>
<?php
template_footer();
?>