<template>
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">登录</div>

				<div class="card-body">
					<form action="#" method="post">
						<div class="form-group row">
							<label for="username" class="col-md-4 col-form-label text-right">用户名</label>
							<div class="col-md-8">
								<input type="text" id="username" name="username" class="form-control" placeholder="用户名" required autofocus>
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-right">密码</label>
							<div class="col-md-8">
								<input type="password" id="password" name="password" class="form-control" placeholder="密码" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-8"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-8 ml-auto">
								<button type="submit" class="btn btn-primary">登录</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>