<?php
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page'])) {
  $page = (int) $_GET['page'];
}
$in_one_page = 10;
$start = $in_one_page * ($page - 1);

// 每頁的留言
$stmt = $conn->prepare("SELECT * FROM ZRuei_comments WHERE parent_id = 0 ORDER BY created_at DESC LIMIT ?, ?");
$stmt->bind_param("ss", $start, $in_one_page);
$stmt->execute();
$result = $stmt->get_result();

// 共有幾則留言
$count_page_sql = "SELECT count(*) FROM ZRuei_comments WHERE parent_id = 0";
$count_page_stmt = $conn->prepare($count_page_sql);
$count_page_stmt->execute();
$count_page_result = $count_page_stmt->get_result();

if (
  $count_page_result &&
  $count_page_result->num_rows > 0
) {
  $count = $count_page_result->fetch_assoc()['count(*)'];
  $in_one_page = 10;
  $total_page = ceil($count / $in_one_page);
  echo "<div class='pages'>";
  for ($i = 1; $i <= $total_page; $i++) {
    echo "<a href='./index.php?page=$i'>$i</a>";
  }
  echo "</div>";
}
