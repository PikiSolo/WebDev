<!-- create_blog_process.php -->
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$content = $_POST['content'];
$author_id = $_SESSION['user_id'];

$sql = "INSERT INTO blogs (title, content, author_id) VALUES ('$title', '$content', '$author_id')";
if ($conn->query($sql) === TRUE) {
    echo "Blog created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
