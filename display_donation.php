<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="display.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Donations Recieved</title>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="navbar-brand" href="home.html" style="font-weight:bold;">Donations Recieved</a>
                <a class="nav-link text-light" href="home.html">Home</a>
                <a class="nav-link text-light" href="about.html">About Us</a>
                <a class="nav-link text-light" href="contact.html">Contacts</a>
            </div>
            <div class="d-flex">
                <a class="nav-link text-light" href="services.html">Services</a>
                <a class="nav-link text-light" href="dashboard.html">Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Reason</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database configuration
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "donors";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data from database
                $sql = "SELECT sno, name, email, phone, amount, sector, reason FROM details";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>$" . $row["amount"] . "</td>";
                        echo "<td>" . $row["sector"] . "</td>";
                        echo "<td>" . $row["reason"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No donations found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
