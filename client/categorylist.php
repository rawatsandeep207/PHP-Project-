<div>
    <h1 class="heading">Categories</h1>
    <?php
    include "./common/dp.php";
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $result = $stmt->get_result();
    foreach ($result as $row) {
        $name = $row['Name'];
        $id = $row['Id'];
        echo "<div class='category-item question-list category-item'>
                <h2><a href='?c-id=$id'>$name</a></h2>
              </div>";
    }
    ?>