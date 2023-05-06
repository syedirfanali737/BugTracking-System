<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[student_id])
	{
		$SQL="SELECT * FROM student, city, state, country, course WHERE student_city = city_id AND student_state = state_id AND student_country  = country_id AND student_course_id = course_id AND student_id = $_REQUEST[student_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
	global $SERVER_PATH;
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Student Details Report</h4>
				<form action="lib/student.php" enctype="multipart/form-data" method="post" name="frm_car">
					<ul class="forms">
						<li class="txt">Course</li>
						<li class="inputfield"><?=$data[course_title]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">First Name</li>
						<li class="inputfield"><?=$data[student_first_name]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">Last Name</li>
						<li class="inputfield"><?=$data[student_last_name]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">Certificate No</li>
						<li class="inputfield"><?=$data[student_certno]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">Student ID</li>
						<li class="inputfield"><?=$data[student_father_name]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">Cohort</li>
						<li class="inputfield"><?=$data[student_dob]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">Mobile Number</li>
						<li class="inputfield"><?=$data[student_mobile]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">Year Graduated</li>
						<li class="inputfield"><?=$data[student_graduated]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">District</li>
						<li class="inputfield"><?=$data[city_name]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">County</li>
						<li class="inputfield"><?=$data[state_name]?></li>
					</ul>
					<ul class="forms">
						<li class="txt">Country</li>
						<li class="inputfield"><?=$data[country_name]?></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="button" value="Print Details" class="simplebtn" onClick="window.print()"></li>
					</ul>
					<input type="hidden" name="student_id" value="<?=$data[student_id]?>">
					<input type="hidden" name="avail_image" value="<?=$data[student_photo]?>">
					<input type="hidden" name="act" value="save_student">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($data[student_photo]) { ?>
				<img src="<?=$SERVER_PATH.'uploads/'.$data[student_photo]?>" style="height:200px; width:180px">
			<?php } ?>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
