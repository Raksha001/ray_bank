<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSFER HISTORY</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container card mt-4 rounded shadow-sm p-4" data-aos="fade-up">
        <h2 class="text-center font-weight-bold">TRANSFER HISTORY</h2>
        <br>
        <div class="table-responsive-sm">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col text-white">Sender</th>
                        <th scope="col text-white">Receiver</th>
                        <th scope="col text-white">Amount</th>
                        <th scope="col text-white">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';
                    $sql = "select * from transaction_details";
                    $query = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $rows['sender']; ?></td>
                            <td><?php echo $rows['receiver']; ?></td>
                            <td><?php echo $rows['balance']; ?></td>
                            <td><?php echo $rows['datetime']; ?></td>
                        <?php
                    }
                        ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>