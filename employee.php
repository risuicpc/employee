<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Employee</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li> <a href="employee.php">Employee</a></li>
        </ul>
        <ol>
            <li> <a href="registration.html">Register</a></li>
        </ol>
    </nav>
    <h1>Detail Information of Employee where Specialization is Artificial Intelligence</h1>
    <?php
        $db = mysqli_connect('localhost', 'root', '', 'test');
       
        $employee_check_query = "SELECT * FROM employee WHERE specialization='Artificial Intelligence'  ORDER BY name desc ";
        $result = mysqli_query($db, $employee_check_query);
        ?>

    <style>
        .error {
        width: 92%; 
        margin: 0px auto; 
        padding: 10px; 
        border: 1px solid #a94442; 
        color: #000000; 
        background: #dff0d8; 
        border-radius: 5px; 
        text-align: left;
        }
    </style>
    <div class="error">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Date of birht</th>
                <th>Salary</th>
                <th>Date of join</th>
                <th>Specialization</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["id"] ?> </td>
                    <td><?php echo $row["name"] ?> </td>
                    <td><?php echo $row["designation"] ?> </td>
                    <td><?php echo $row["birth"] ?> </td>
                    <td><?php echo $row["salary"] ?> </td>
                    <td><?php echo $row["date_join"] ?> </td>
                    <td><?php echo $row["specialization"] ?> </td>
                </tr>
            <?php
            }
            } else {
            echo "0 results";
            }
            ?>
        </table>
    </div>

  
</body>

</html>