<div class="container">
<h1 class="heading">Questions</h1>
<div class="col-8">
<?php
include ("./common/dp.php");
$query = "SELECT * FROM questions";
$results = $conn->query($query);
foreach ($results as $row){
    $title = htmlspecialchars($row['Title']);
    $qid = (int) $row['Id'];
    echo "<div class='question-list mb-4'>
            <h2><a href='?q-id=$qid'>$title</a></h2>
          </div>";
}
?>
</div>
</div>