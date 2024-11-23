<?php
include('connect.php');

$friendID = $_GET['friendID'];

if (isset($_POST['btnEdit'])) {
    $status = $_POST['status'];

    $editQuery = "UPDATE friends SET status=? WHERE friendID=?";
    if ($stmt = mysqli_prepare($conn, $editQuery)) {
        mysqli_stmt_bind_param($stmt, "si", $status, $friendID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header('Location: ./');
        exit();
    }
}

$query = "SELECT * FROM friends WHERE friendID = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, "i", $friendID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="icon" href="../mainWeb/logo.png" type="image/png">
</head>
<style>
    
html,
body {
    font-family: 'Roboto', sans-serif;

}
.custom-card {
    position: relative;
    background-color: #f9f9f9; 
    max-width: 100%;
    height: 100%;
    color: #333; 
    margin-top: 10px;
    margin-bottom: 20px;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
    overflow: hidden;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s; 
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
}

.custom-card:hover {
    transform: translateY(-5px); 
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); 
}

.btn-secondary {
    width: 150px;
    font-size: 12px;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    background-color: black;
    color: white;
    border: 1px solid black;
}

h1{    
    margin-bottom: 0.5rem;
    text-shadow: 1px 1px 2px #000000cc;
    font-family: 'Abril Fatface', sans-serif;
    font-weight: bold;
    color: black;
}

p{
    font-size: 1.5rem;
    font-weight: bold;
    color: black;
}
.btn:hover {
    background-color: gray;
    color: white;
}

.radio-option {
    display: flex;
    align-items: center;
    font-size: 16px;
}

.radio-option input {
    margin-right: 10px;
}
</style>

<body>

    <?php
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-body">
        
                    <h1 class="text-center text-dark mb-4">Edit Friend Request Status:</h1>
                    <img src="profilePic.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 80px; height: 80px;">
                    <p class="text-center text-dark">Friend ID: <?php echo $row['friendID']; ?></p>

                    <form method="POST">
                        <div class="form-group">
                            <div class="d-flex justify-content-start mb-2">
                                <label for="status" class="fw-bold text-dark">Status:</label>
                            </div>
                            <div class="d-flex flex-column">
                                <label class="radio-option mb-2">
                                    <input type="radio" id="friends" name="status" value="Friends" 
                                           <?php if ($row['status'] == 'Friends') echo 'checked'; ?>>
                                    <span class="ms-2">Friends</span>
                                </label>
                                <label class="radio-option mb-2">
                                    <input type="radio" id="pending" name="status" value="Pending" 
                                           <?php if ($row['status'] == 'Pending') echo 'checked'; ?>>
                                    <span class="ms-2">Pending</span>
                                </label>
                                <label class="radio-option mb-2">
                                    <input type="radio" id="decline" name="status" value="Decline" 
                                           <?php if ($row['status'] == 'Decline') echo 'checked'; ?>>
                                    <span class="ms-2">Decline</span>
                                </label>
                                <label class="radio-option mb-2">
                                    <input type="radio" id="unfriended" name="status" value="Unfriended" 
                                           <?php if ($row['status'] == 'Unfriended') echo 'checked'; ?>>
                                    <span class="ms-2">Unfriended</span>
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="btnEdit" class="btn btn-secondary btn-lg">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
        } else {
        echo "<p class='text-center'>Friend request not found.</p>";
        }
    ?>
</body>
</html>
