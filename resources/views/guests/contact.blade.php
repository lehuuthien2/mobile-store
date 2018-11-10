@extends('layouts.guests')
@section('content')
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.blade.php"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="index.blade.php">Home</a></li>
				<li><a href="about.blade.php">About</a></li>
				<li><a href="store.php">Store</a></li>
				<li><a href="store.php">Featured</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="contact.blade.php">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">
		    	<div class="section group">				
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Thông tin cửa hàng :</h2>
						    	<p>92 Qang Trung</p>
						   		<p>Quận Hải Châu, Đà Nẵng</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span><a href="#">T&M-Mobile@gmail.com</a></span></p>
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Liên Hệ Với Chúng Tôi</h2>
					    <form>
					    	<div>
						    	<span><label>Họ Tên</label></span>
						    	<span><input type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value=""></span>
						    </div>
						    <div>
						     	<span><label>Số Điện Thoại</label></span>
						    	<span><input type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>Nội dung</label></span>
						    	<span><textarea> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Gửi"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
		    </div>
		    </div>
	@endsection
