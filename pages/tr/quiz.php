<?php
session_start();

// Define the question and the correct answer
$question = "What is the capital of France?";
$correct_answer = "Paris";

// Initialize variables
$user_answer = "";
$result = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's answer from the POST request
    $user_answer = trim($_POST['answer']);
    
    // Check if the answer is correct
    if (strcasecmp($user_answer, $correct_answer) == 0) {
        $result = "Correct! The capital of France is indeed Paris.";
    } else {
        $result = "Incorrect. The correct answer is Paris.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-</title>
</head>
<body>
    <h1>Quiz Question</h1>
    <form method="post" action="">
        <p><?php echo $question; ?></p>
        <input type="text" name="answer" placeholder="Your answer here" required>
        <button type="submit">Submit Answer</button>
    </form>

    <?php if ($result): ?>
        <h2>Result:</h2>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>