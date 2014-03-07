<?php

$con = mysqli_connect("localhost", "root", "", "book_exchange");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM post, book_info, author_book, author 
    WHERE post_book_id = book_id
    AND book_id = b_id
    AND a_id = author_id
    AND post_id = 17");

while ($row = mysqli_fetch_array($result)) {
    echo $row['author_name'];
    echo "<br>";
}

mysqli_close($con);
?>
