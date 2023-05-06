<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[project_id])
	{
		$SQL="SELECT * FROM project WHERE project_id = $_REQUEST[project_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Add New Project</h4>
				<form action="lib/project.php" enctype="multipart/form-data" method="post" name="frm_project">
					<ul class="forms">
						<li class="txt">Project Title</li>
						<li class="inputfield"><input name="project_title" type="text" class="bar" required value="<?=$data[project_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Type</li>
						<li class="inputfield">
							<select name="project_type_id" class="bar" required/>
								<?php echo get_new_optionlist("type","type_id","type_title",$data[project_type_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Manager</li>
						<li class="inputfield">
							<select name="project_manager_id" class="bar" required/>
								<?php echo get_new_optionlist("user","user_id","user_name",$data[project_manager_id]); ?>
							</select>
						</li>
					</ul>					
					<ul class="forms">
						<li class="txt">Frontend</li>
						<li class="inputfield"><input name="project_frontend" type="text" class="bar" required value="<?=$data[project_frontend]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Backend</li>
						<li class="inputfield"><input name="project_backend" type="text" class="bar" required value="<?=$data[project_backend]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Client Name</li>
						<li class="inputfield"><input name="project_client_name" type="text" class="bar" required value="<?=$data[project_client_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="project_description" cols="" rows="6" required><?=$data[project_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_project">
					<input type="hidden" name="project_id" value="<?=$data[project_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 