<?php
$sub_stmt = $conn->prepare("SELECT * FROM ZRuei_comments WHERE parent_id = ? ORDER BY created_at ASC");
$sub_stmt->bind_param("i", $row['id']);
$sub_stmt->execute();
$sub_result = $sub_stmt->get_result();
if ($sub_stmt) {
  while ($sub_row = $sub_result->fetch_assoc()) {
    ?>
    <div class="sub-comment__wrapper">
      <div class="comment__info">
        <div class="comment__info-author"><?php echo htmlspecialchars($sub_row['nickname'], ENT_QUOTES, 'UTF-8') ?></div>
        <div class="comment__info-timestamp"><?php echo $sub_row['created_at'] ?></div>
        <?php
        if (
          $is_login &&
          $name['nickname'] === $sub_row['nickname']
        ) {
          echo renderEditBtn($sub_row['id']);
          echo renderDelBtn($sub_row['id']);
        }
        ?>
      </div>
      <?php
      if ($row['nickname'] === $sub_row['nickname']) {
        ?>
        <div class="comment__content orignal-poster"><?php echo htmlspecialchars($sub_row['content'], ENT_QUOTES, 'UTF-8') ?></div>
      <?php
      } else {
        ?>
        <div class="comment__content"><?php echo htmlspecialchars($sub_row['content'], ENT_QUOTES, 'UTF-8') ?></div>
      <?php
      }
      ?>
    </div>
  <?php
  }
}
?>