<!-- <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form id="login-form">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="username" class="form-control form-control-lg" />
                                    <label class="form-label">UserName</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" />
                                    <label class="form-label">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2">
                                    <a class="text-white-50" href="#">Forgot password?</a>
                                </p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#" class="text-white mx-4 px-2"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? 
                                    <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 -->
<?php
include_once 'app/admin/shares/header.php';
?>
 <div class="wrapper">
			<div class="inner">
				<img src="/webbanhang/public/img/image-1.png" alt="" class="image-1">
				<form id="login-form" action="">
					<h3>Login</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<button type="submit">
						<span>Login</span>
					</button>
                    <div style="display: flex;justify-content: center;margin-top: 18px;">
                        <p >Don't have an account? <a href="">Sign up</a></p>
                    </div>
				</form>
				<img src="/webbanhang/public/img/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="/webbanhang/public/js/jquery-3.3.1.min.js"></script>
		<script src="/webbanhang/public/js/main.js"></script>

<script>
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const jsonData = {};
        
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        fetch('/webbanhang/account/checkLogin', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.token) {
                localStorage.setItem('jwtToken', data.token);
                localStorage.setItem('role',data.role);
                localStorage.setItem('username' , data.username);
                
                if(data.role === 'admin'){
                    location.href ='/webbanhang/Product';
                } else {
                    location.href ='/webbanhang/home';
                }       
            }
        });
    });
</script>
