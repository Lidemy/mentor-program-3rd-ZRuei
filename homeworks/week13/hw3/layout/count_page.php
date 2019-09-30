<?php
$current_page = 1;

if (isset($_GET['page']) && !empty($_GET['page'])) {
  $current_page = (int) $_GET['page'];
}
$per_page = 10;
$start = $per_page * ($current_page - 1);

// 每頁的留言
$sql = "SELECT * FROM ZRuei_comments 
WHERE parent_id = 0 ORDER BY created_at DESC LIMIT ?, ?";
$stmt = $conn->prepare($sql );
$stmt->bind_param("ss", $start, $per_page);
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
  $total_page = ceil($count / $per_page);
}
?>
<nav class="row" aria-label="Page navigation">
  <ul class="pagination mx-auto">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php
    for ($i = 1; $i <= $total_page; $i++) {
      echo "<li class='page-item'>";
      echo "<a class='page-link' href='./index.php?page=$i'>$i</a>";
      echo "</li>";
    }
    ?>
    <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
      <span class="sr-only">Next</span>
    </a>
    </li>
  </ul>
</nav>