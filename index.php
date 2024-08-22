<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

    $conn = mysqli_connect("localhost", "root", "", "tugasdb");
    $search = '';

    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM tugas13 WHERE Position LIKE '%$search%' OR URL LIKE '%$search%' OR Title LIKE '%$search%' OR Description LIKE '%$search%'";
    } else {
        $query = "SELECT * FROM tugas13";
    }
    $data = mysqli_query($conn, $query);
?>
    <form method="POST">
        <input type="text" name="search" placeholder="Search here...">
        <button type="submit">Search</button>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>Position</th>
                <th>URL</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row["Position"]; ?></td>
                <td><a href="<?php echo $row["URL"]; ?>" target="_blank"><?php echo $row["URL"]; ?></td>
                <td><?php echo $row["Title"]; ?></td>
                <td><?php echo $row["Description"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>