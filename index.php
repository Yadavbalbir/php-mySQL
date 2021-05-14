<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iit.isc</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="stylet.css">


<body>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Name = $_POST['Name'];
        $LDAP = $_POST['LDAP'];
        $RollNo = $_POST['RollNo'];
        $Divison = $_POST['Divison'];
        $Gender = $_POST['Gender'];
        $contact = $_POST['contact'];
        // echo "Registration Successful!";


        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "isc";

        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die("Connection failed here" . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO `registration` (`Name`, `LDAP`, `RollNo`, `Divison`, `Gender`, `contact`) VALUES
                     ('$Name', '$LDAP', '$RollNo', '$Divison', '$Gender', '$contact')";
            $result = mysqli_query($conn, $sql);

            if ($result) { ?>

                <script>
                    alert("Congratulations! Registration Succcessful");
                </script>
    <?php
            } else {
                echo "Connection failed here" . mysqli_error($conn);
            }
        }
    }
    ?>
    <div class="container">
        <h2>Aavhan IIT Bombay Resgistration Form</h2>
        <p>Kindly enter your details for participation in <b>Mega Aavhan Event</b></p>

        <form action="index.php" method="POST">
            <input type="text" name="Name" id="name" placeholder="Enter Name">
            <input type="text" name="LDAP" id="LDAP" placeholder="Enter LDAP">
            <input type="text" name="RollNo" id="RollNo" placeholder="Enter RollNo">
            <input type="text" name="Divison" id="Divison" placeholder="Enter Divison">
            <input type="text" name="Gender" id="Gender" placeholder="Gender">
            <input type="text" name="contact" id="contact" placeholder="Contact">
            <button class="btn">Submit</button>
        </form>
    </div>
    <h1 style="text-align: center; margin:15px 0px">List of Registered Students</h1>

      
        <div class="main">
            <div class="center-div">
                <table>
                    <thead style="background-color: blue;">
                        <tr>
                            <th>Name</th>
                            <th>LDAP</th>
                            <th>RollNo</th>
                            <th>Divison</th>
                            <th>Gender</th>
                            <th>contact</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "isc";
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            $selectquery= "select * from registration";
                            $query=mysqli_query($conn,$selectquery);
                            $nums=mysqli_num_rows($query);

                            //    $res =mysqli_fetch_array($query);
                            $i=0;
                            while($res =mysqli_fetch_array($query)){
                                ?>
                                 <tr>
                                     <td><?php echo $res['Name']; ?></td>
                                     <td><?php echo $res['LDAP']; ?></td>
                                     <td><?php echo $res['RollNo']; ?></td>
                                     <td><?php echo $res['Divison']; ?></td>
                                     <td><?php echo $res['Gender']; ?></td>
                                     <td><?php echo $res['contact']; ?></td>
                                 </tr>
                            <?php
                            }
                     ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>