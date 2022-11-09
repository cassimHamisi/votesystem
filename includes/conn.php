<?php
$conn = new mysqli('localhost', 'root', '2532', 'voting system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
