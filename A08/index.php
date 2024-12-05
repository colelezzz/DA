<?php
include("connect.php");

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$filterValue = isset($_GET['filterValue']) ? $_GET['filterValue'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC'; 

$values = [];
if ($filter === 'departureAirportCode') {
    $values = ['MBI', 'BKD', 'GEX', 'XGN', 'MDP', 'BMO', 'PLJ', 'RYO', 'IAN', 'WDA', 'TSN', 'OGS', 'YLH', 'BFL', 'PIL', 'DJE', 'LDW', 'JWA', 'GLD', 'CPU', 'NUU', 'LAP', 'TLB', 'PGU', 'KDD'];
} elseif ($filter === 'arrivalAirportCode') {
    $values = ['YNB', 'UKH', 'NEN', 'TTG', 'BIU', 'POF', 'AHH', '0', 'LZN', 'OSG', 'KRN', 'IRZ', 'NNI', 'HLT', 'LLE', 'WML', 'YJF', 'GEM', 'LEZ', 'PQS', 'WAO', 'XYE', 'IXD', 'CYM', 'SOZ'];
} elseif ($filter === 'aircraftType') {
    $values = ['Airbus A320', 'Boeing 737', 'Embraer E190'];
}

$flightsQuery = "SELECT * FROM flightlogs";
$filters = [];

if ($filter !== '' && $filterValue !== '') {
    $filters[] = "$filter = '$filterValue'"; 
}

if (!empty($filters)) {
    $flightsQuery .= " WHERE " . implode(" AND ", $filters);
}

if ($sort !== '') {
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
        <label for="filter" class="form-label">Filter By:</label>
        <select id="filter" name="filter" class="form-select" onchange="this.form.submit()">
            <option value="">None</option>
            <option value="departureAirportCode" <?php echo ($filter === 'departureAirportCode') ? 'selected' : ''; ?>>Departure Code</option>
            <option value="arrivalAirportCode" <?php echo ($filter === 'arrivalAirportCode') ? 'selected' : ''; ?>>Arrival Code</option>
            <option value="aircraftType" <?php echo ($filter === 'aircraftType') ? 'selected' : ''; ?>>Aircraft</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="filterValue" class="form-label">Filter:</label>
        <select id="filterValue" name="filterValue" class="form-select">
            <option value="">Select</option>
            <?php
            foreach ($values as $value) {
                echo "<option value=\"$value\" " . (($filterValue === $value) ? 'selected' : '') . ">$value</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">FILTER</button>

                    <div class="mb-3">
                        <label for="sort" class="form-label mt-3">Sort:</label>
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
                                <th scope="col">Departure Code</th>
                                <th scope="col">Arrival Code</th>
                                <th scope="col">Departure Date</th>
                                <th scope="col">Arrival Date</th>
                                <th scope="col">Passenger Count</th>
                                <th scope="col">Aircraft</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($flightResults) > 0) {
                                while ($flightRow = mysqli_fetch_assoc($flightResults)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $flightRow['flightNumber'] ?></th>
                                        <td><?php echo $flightRow['departureAirportCode'] ?></td>
                                        <td><?php echo $flightRow['arrivalAirportCode'] ?></td>
                                        <td><?php echo $flightRow['departureDatetime'] ?></td>
                                        <td><?php echo $flightRow['arrivalDatetime'] ?></td>
                                        <td><?php echo $flightRow['passengerCount'] ?></td>
                                        <td><?php echo $flightRow['aircraftType'] ?></td>
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