<div class="container">
<h1 class="heading">Answers</h1>
<?php
$query = "SELECT * FROM answers WHERE Question_Id = $qid";
$result = $conn->query($query); 
foreach ($result as $row) {
    $answer = $row['Answer'];
    echo "<div class='row answer-list'>
            <p>$answer</p>
          </div>";
}   