<?php
include "includes/conn.php";
session_start();

if (isset($_SESSION['admin'])) {
	header('location: admin/home.php');
}

if (isset($_SESSION['hr'])) {
	header('location: hr.php');
}

// if (isset($_SESSION['auditor'])) {
// 	header('location: auditor/home.php');
// }



if (isset($_SESSION['user'])) {
	$conn = $pdo->open();

	try {
		$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
		$stmt->execute(['id' => $_SESSION['user']]);
		//user account is my default when signing up

		$user = $stmt->fetch();
	} catch (PDOException $e) {
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();
}
