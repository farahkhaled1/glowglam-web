<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
	$id = $_POST['id'];

	$conn = $pdo->open();

	try {
		$stmt = $conn->prepare("DELETE FROM survey_set WHERE id=:id");
		$stmt->execute(['id' => $id]);

		$_SESSION['success'] = 'Survey deleted successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Select survey to delete first';
}

header('location: survey_list.php');
