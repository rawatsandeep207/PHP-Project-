<div class="container">
<h1 class="heading">Question</h1>
<div class="row">
<div class="col-md-8">
<?php
include ("./common/dp.php");
$query = "SELECT * FROM questions where Id = $qid";
$result = $conn->query($query);
foreach ($result as $row){
    if ((int) $row['Id'] === $qid){
        $title = htmlspecialchars($row['Title']);
        $description = nl2br(htmlspecialchars($row['Description']));
        echo "<div class='question-details mb-4'>
                <h2>$title</h2>
                <p>$description</p>
              </div>";
    }
}
?>
<form action="./server/requests.php" method="POST">
<input type="hidden" name="question_id" value="<?php echo $qid; ?>">
<textarea name="answer" id="answer" class="form-control" rows="5" placeholder="Your answer here..."></textarea>
<button id="submit-answer" class="btn btn-primary mt-2">Submit Answer</button>
</form>
</div>
</div>