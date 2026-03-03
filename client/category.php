<select class="form-control" name="category_id" class="form-control" required>
   <option value="">Select Category</option>
    <?php include "./common/dp.php";
     $stmt = $conn->prepare("SELECT * FROM category"); 
     $stmt->execute();
      $result = $stmt->get_result();
       foreach ($result as $row) {
         $name = $row['Name']; 
         $id = $row['Id']; 
         echo "<option value=$id >$name</option>"; }
          ?> 
          </select>