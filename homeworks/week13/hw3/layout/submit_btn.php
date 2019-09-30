<div class="row">
  <div class="col-10">
    <?php
    if ($is_login) {
      ?>
      <input class="btn btn-dark btn-sm" type="submit" value="發佈">
    <?php
    } else {
      ?>
      <input class="btn btn-dark btn-sm" type="submit" value="註冊或登入" disabled="disabled">
    <?php
    }
    ?>
  </div>
</div>