<?php

$conn = new mysqli('localhost', 'root', '', 'akkalpa2');

if (!$conn) {
  die(mysqli_error($conn));
}
