<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM project, user, `type` WHERE project_manager_id = user_id AND project_type_id = type_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_project(project_id)
{
	if(confirm("Do you want to delete the project?"))
	{
		this.document.frm_project.project_id.value=project_id;
		this.document.frm_project.act.value="delete_project";
		this.document.frm_project.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Project Reports</h4>
				<div class = "msg"><?=$_REQUEST['msg']?></div>
			<?php if(mysqli_num_rows($rs)) { ?>
			<form name="frm_project" action="lib/project.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Title</td>
						<td scope="col">Manager</td>
						<td scope="col">Type</td>
						<td scope="col">Fronend</td>
						<td scope="col">Backend</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><?=$data[project_title]?></td>
						<td><?=$data[user_name]?></td>
						<td><?=$data[type_title]?></td>
						<td><?=$data[project_frontend]?></td>
						<td><?=$data[project_backend]?></td>
						<td style="text-align:center"><a href="project.php?project_id=<?php echo $data[project_id] ?>">Edit</a> | <a href="Javascript:delete_project(<?=$data[project_id]?>)">Delete</a> </td>
					  </tr>
					<?php } 
					}
					else {
					?>
						<div class = "msg">No Project Found !!!</div>
					<?php
					}?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="project_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 