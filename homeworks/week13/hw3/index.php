<?php
require_once('./conn.php');
require_once('./toolbox/check_login.php');
require_once('./toolbox/tools.php');

?>
<!DOCTYPE html>
<html lang="zh-Han-TW">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<title>MAO Chat Room</title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="./js/board.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/board_style.css">

</head>

<body>

	<?php
	require_once('layout/nav.php');
	?>
	<div class="container">
		<div class="row">
			<div class="col-10 mx-auto">
				<h1 class="text-center display-4 title">MaoMao Chat Room</h1>
				<p class="text-center lead title">↓↓↓ 馬上來聊一波啊 ↓↓↓</p>
				<form class="post mx-auto">
					<div class="form-group row">
						<div class="col-10 mx-auto">
							<input type="hidden" value="0" name="parent_id">
							<textarea class="col-12" name="content" type="text" rows="6" placeholder="來留個言吧⋯⋯"></textarea>
							<!-- <input type="hidden" name="nickname" value="<?php echo $nickname ?>"> -->
							<?php
							if ($is_login) {
								?>
								<input class="btn btn-dark" type="submit" value="發佈">
							<?php
							} else {
								?>
								<input class="btn btn-dark" type="submit" value="註冊或登入" disabled="disabled">
							<?php
							}
							?>
						</div>
					</div>
				</form>


				<?php
				include('./layout/count_page.php');
				?>
				<div id="comments" class="row">
					<div class="col-10 mx-auto">
						<?php
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								?>
								<!-- comment -->
								<div id="comment" class="card mb-3 p-1">
									<div class="card-body">
										<div class="card-title mb-1"><?php echo escapeChars($row['nickname']) ?>
											<small class="text-muted ml-2"> 發表於 <?php echo $row['created_at']; ?></small>
										</div>

										<div class="row">
											<p class="card-text col-7">
												<?php echo escapeChars($row['content']) ?>
											</p>
											<div class="col-5 d-flex justify-content-end">
												<?php
													if (
														$is_login &&
														$nickname === $row['nickname']
													) {
														echo renderEditBtn($row['id']);
														echo renderDelBtn($row['id']);
													}
													?>
											</div>
										</div>
										<!-- comment -->
										<hr>
										
											<?php
											include('./layout/sub_comment.php');
											?>
									
										<form class="sub-post mx-auto">
											<input type="hidden" name="parent_id" value="<?php echo $row['id'] ?>">
											<div class="input-group text-center mt-4">

												<textarea class="form-control mr-3" name="content" type="text" rows="2" placeholder="來留個言吧⋯⋯"></textarea>
												<span>
													<div class="row">
														<div class="col-10">
															<?php
																if ($is_login) {
																	?>
																<input class="btn btn-dark btn-sm" type="submit" value="回覆">
															<?php
																} else {
																	?>
																<input class="btn btn-dark btn-sm" type="submit" value="註冊或登入" disabled="disabled">
															<?php
																}
																?>
														</div>
													</div>
													<input type="hidden" name="nickname" value="<?php echo $nickname ?>">
												</span>
											</div>
										</form>
									</div>
								</div>

						<?php
							}
						}
						?>
					</div>
				</div>
				<?php
				include('./layout/count_page.php');
				?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<!-- FIXME 手機跑版 -->
	<footer class="bg-light">

		<!-- Copyright -->
		<div class="text-center p-4 mt-5">© 2019 Copyright:
			<a href="#"> MaoChat.com</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->
</body>

</html>

<!-- TODO RWD/LAYOUT -->