<ul>
	<li>회원가입</li>
	<li class="bd" onclick="loginOpen();">로그인</li>
</ul>

<div class="login_mask obj_login_mask"></div>
<div class="pop_login obj_pop_login" >
	<h3>
		CTL 로그인
		<a class="close" onclick="loginClose();"></a>
	</h3>
	<div class="body">
		<div class="box">
			<p>
				<b>아이디</b>
				<span><input type="text" name="email" /></span>
			</p>
			<p>
				<b>비밀번호</b>
				<span><input type="password" name="password" /></span>
			</p>
			<button type="submit" class="login_btn">로그인</button>
			<p class="add_form">
				<a href="#">비밀번호 찾기<i class="fa fa-angle-right" aria-hidden="true"></i></a>
				<a href="#">회원가입<i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</p>
		</div>
	</div>
	<div class="bottom">
		<p><b>서울대구성원</b>은 통합인증 로그인을 하세요</p>
		<a href="">통합인증 로그인<i></i></a>
	</div>
</div>