<?php
include("connect.php");

$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

$flightsQuery = "SELECT * FROM flightlogs";

if ($sort != '') {
    $flightsQuery .= " ORDER BY $sort $order";
}

$flightResults = executeQuery($flightsQuery);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aviation Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../mainWeb/logo.png" type="image/png">

    <style>
        body {
            background-color: #E6E6FA;
        }

        img {
            mix-blend-mode: multiply;
        }

        .btn {
            background-color: #B181C6; 
            color: white;
            border: none;  
        }
        
        .btn:hover {
            background-color: #623B73; 
            color: white;
            border: none;  
        }
    </style>
</head>

<body>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <img src="https://t3.ftcdn.net/jpg/08/98/52/44/360_F_898524494_JASUshpVvgrm9gpTzg7Tbe9PaD7z23Ac.jpg">
                <h2>Aviation Dashboard</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col">
                <form>
                    <div class="mb-3">
                        <label for="sort" class="form-label">Sort:</label>
                        <select id="sort" name="sort" class="form-select">
                            <option value="">None</option>
                            <option value="flightNumber" <?php echo ($sort == 'flightNumber') ? 'selected' : ''; ?>>Flight
                                Number</option>
                            <option value="departureDatetime" <?php echo ($sort == 'departureDatetime') ? 'selected' : ''; ?>>Departure Date Time</option>
                            <option value="arrivalDatetime" <?php echo ($sort == 'arrivalDatetime') ? 'selected' : ''; ?>>
                                Arrival Date Time
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="order" class="form-label">Order:</label>
                        <select id="order" name="order" class="form-select">
                            <option value="ASC" <?php echo ($order == 'ASC') ? 'selected' : ''; ?>>ASCENDING</option>
                            <option value="DESC" <?php echo ($order == 'DESC') ? 'selected' : ''; ?>>DESCENDING</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">SORT</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Flight Number</th>
                                <th scope="col">Departure Date</th>
                                <th scope="col">Arrival Date</th>
                                <th scope="col">Flight Duration</th>
                                <th scope="col">Passenger Count</th>
                                <th scope="col">Airline</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($flightResults) > 0) {
                                while ($flightRow = mysqli_fetch_assoc($flightResults)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $flightRow['flightNumber'] ?></th>
                                        <td><?php echo $flightRow['departureDatetime'] ?></td>
                                        <td><?php echo $flightRow['arrivalDatetime'] ?></td>
                                        <td><?php echo $flightRow['flightDurationMinutes'] ?></td>
                                        <td><?php echo $flightRow['passengerCount'] ?></td>
                                        <td><?php echo $flightRow['airlineName'] ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center'>No flight records found</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>