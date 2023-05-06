<?php 
	include_once("includes/header.php"); 
	if($_SESSION['login'] != 1) {
		header("Location:login.php?msg=Login first to continue !!!");
	} 
	if($_REQUEST[bug_id])
	{
		$SQL="SELECT * FROM bug WHERE bug_id = $_REQUEST[bug_id]";
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
				<h4 class="heading colr">Add New Bug</h4>
				<form action="lib/bug.php" enctype="multipart/form-data" method="post" name="frm_car">
					<ul class="forms">
						<li class="txt">Title</li>
						<li class="inputfield"><input name="bug_title" type="text" class="bar" required value="<?=$data[bug_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Select Project</li>
						<li class="inputfield">
							<select name="bug_project_id" class="bar" required/>
								<?php echo get_new_optionlist("project","project_id","project_title",$data[bug_project_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Select Type</li>
						<li class="inputfield">
							<select name="bug_type_id" class="bar" required/>
								<?php echo get_new_optionlist("bug_type","bt_id","bt_title",$data[bug_type_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Assigned To</li>
						<li class="inputfield">
							<select name="bug_user_id" class="bar" required/>
								<?php echo get_new_optionlist("user","user_id","user_name",$data[bug_user_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Bug Status</li>
						<li class="inputfield">
							<select name="bug_status" class="bar" required/>
								<?php echo get_new_optionlist("bug_status","bs_id","bs_title",$data[bug_status]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Start Date</li>
						<li class="inputfield"><input name="bug_start_date" type="text" class="bar" required value="<?=$data[bug_start_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Due Date</li>
						<li class="inputfield"><input name="bug_due_date" type="text" class="bar" required value="<?=$data[bug_due_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Total Time</li>
						<li class="inputfield"><input name="bug_hours" type="text" class="bar" required value="<?=$data[bug_hours]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="bug_description" cols="" rows="6" required><?=$data[bug_description]?></textarea></li>
						</li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Save Bug" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="bug_id" value="<?=$data[bug_id]?>">
					<input type="hidden" name="avail_image" value="<?=$data[bug_photo]?>">
					<input type="hidden" name="act" value="save_bug">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($data[bug_photo]) { ?>
				<img src="<?=$SERVER_PATH.'uploads/'.$data[bug_photo]?>">
			<?php } ?>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
