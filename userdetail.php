<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users_details where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users_details where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Negative values cannot be transferred")';
        echo "</script>";
    } else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';
        echo '</script>';
    } else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Zero value cannot be transferred')";
        echo "</script>";
    } else {


        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users_details set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);



        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users_details set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');
        $sql = "INSERT INTO transaction_details(`sender`, `receiver`, `balance`,`datetime`) VALUES ('$sender','$receiver','$amount','$date')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('TRANSACTION Successful');
                                window.location='transfermoney.php';
                    </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container card mt-4 rounded shadow-sm p-4" data-aos="fade-up">
        <h2 class="text-center font-weight-bold">TRANSACTION</h2>
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM  users_details where id=$sid";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext"><br>
            <div>
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $rows['id'] ?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['balance'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <label class="text-dark font-weight-bold">Transfer To</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                include 'config.php';
                $sid = $_GET['id'];
                $sql = "SELECT * FROM users_details where id!=$sid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option class="table text-dark" value="<?php echo $rows['id']; ?>">
                        <?php echo $rows['name']; ?>
                    </option>
                <?php
                }
                ?>
                <div>
            </select>
            <br>
            <label class="text-dark font-weight-bold">Amount</label>
            <input type="number" class="form-control" name="amount" required>
            <br>
            <div>
                <button class="btn mt-3 btn-dark" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>