<ul>
	<li class="user">
        <a onclick="mypopOpen();"><?php echo $member->name; ?><i class="fa fa-angle-down" aria-hidden="true"></i></a><img src="<?php echo $member->photo; ?>" class="thum" />
        <div class="mypop obj_mypop">
            <a class="close mi mi-close" onclick="mypopClose();"></a>
            <img src="<?php echo $member->photo; ?>" class="thum" />
            <h4><?php echo $member->name; ?></h4>
            <p>공과대학 전기공학과 (3학년)</p>
            <ul>
                <li><a>신청현황<b>(2)</b></a></li>
                <li><a>설정</a></li>
                <li><a>로그아웃</a></li>
            </ul>
        </div>
    </li>
</ul>
