<?php
if ($is_login) {
  ?>
  <input type="submit" value="發佈">
<?php
} else {
  ?>
  <input type="submit" value="要登入才可以留言嘿" disabled="disabled">
<?php
}
?>