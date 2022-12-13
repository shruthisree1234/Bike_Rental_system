<?php
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '' );

/** Database username */
define( 'DB_USER', 'dtn5102' );

/** Database password */
define( 'DB_PASSWORD', 'Year4Is2022AtUTA' );

/** Database hostname */
define( 'DB_HOST', 'az6F72ldbp1.az.uta.edu:1523/pcse1p.data.uta.edu' );

//contact database name
define( 'DB_CONTACT', 'Fall22_S004_3_User' );



function conn_connect_mysql() {
 return oci_connect(DB_USER, DB_PASSWORD, DB_HOST);
}

function updateSQL($tablename, $rowID_field, $update_field)
{
    $conn = conn_connect_mysql();

    $sql_query = "UPDATE $tablename SET $update_field WHERE $rowID_field";

    $array = oci_parse($conn, $sql_query);
    oci_execute($array);

    oci_close($conn);
}


function template_header($title) {
    echo <<<EOT
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>$title</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
                <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
                <script src="https://www.jqueryscript.net/demo/Creating-A-Live-Editable-Table-with-jQuery-Tabledit/jquery.tabledit.js"></script>
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                
                
                
                </head>
            <body>
            <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">Bike Rental Management</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="customers.php">Customers <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="bookings.php">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="vehicles.php">Vehicles</a>
                </li>
                </ul>

            </div>
            </nav>
    EOT;
    }

    function template_footer() {
        echo <<<EOT
 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        
        </body>
        </html>
        EOT;
        }
?>