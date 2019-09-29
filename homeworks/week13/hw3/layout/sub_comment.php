<?php
$sub_stmt = $conn->prepare("SELECT * FROM ZRuei_comments WHERE parent_id = ? ORDER BY created_at ASC");
$sub_stmt->bind_param("i", $row['id']);
$sub_stmt->execute();
$sub_result = $sub_stmt->get_result();

if ($sub_stmt) {
  while ($sub_row = $sub_result->fetch_assoc()) {
    ?>
    <div id="sub-comment">
      <div class="card-title mb-1"><?php echo escapeChars($sub_row['nickname']) ?>
        <small class="text-muted ml-2"> 發表於 <?php echo $sub_row['created_at'] ?></small>
      </div>

      <div class="row">
        <?php
            if ($nickname === $sub_row['nickname']) {
              ?>
          <p class="card-text col-7 original-poster"><?php echo escapeChars($sub_row['content']) ?></p>
        <?php
            } else {
              ?>
          <p class="card-text col-7"><?php echo escapeChars($sub_row['content']) ?></p>
        <?php
            }
            ?>
        <div class="col-5 d-flex justify-content-end">
          <?php
              if (
                $is_login &&
                $nickname === $sub_row['nickname']
              ) {
                echo renderEditBtn($sub_row['id']);
                echo renderDelBtn($sub_row['id']);
              }

              ?>
        </div>
      </div>
    </div>
<?php
  }
}
?>