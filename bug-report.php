<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	if($_REQUEST[search_text]!="")
	{
		$SQL="SELECT * FROM bug, project, bug_type, bug_status, user WHERE bug_project_id = project_id AND bs_id = bug_status AND bug_type_id = bt_id AND bug_user_id = user_id AND bug_title = '$_REQUEST[search_text]'";
	}
	else
	{
		$SQL="SELECT * FROM bug, project, bug_type, bug_status, user WHERE bug_project_id = project_id AND bs_id = bug_status AND bug_type_id = bt_id AND bug_user_id = user_id";
	}
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_bug(bug_id)
{
	if(confirm("Do you want to delete the bug?"))
	{
		this.document.frm_bug.bug_id.value=bug_id;
		this.document.frm_bug.act.value="delete_bug";
		this.document.frm_bug.action = "lib/bug.php";
		this.document.frm_bug.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Bug Reports</h4>
			<form name="frm_bug" action="#" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr>
						<td colspan="7">Search : <input type="text" name="search_text" class="inputfield" style="height: 23px; width: 229px;">&nbsp;&nbsp;<input type="submit" value="Search" class="simplebtn"></td>
					  </tr>
					  <tr class="tablehead bold">
						<td scope="col">ID </td>
						<td scope="col">Title</td>
						<td scope="col">Assigned To</td>
						<td scope="col">Project</td>
						<td scope="col">Type</td>
						<td scope="col">Status</td>
						<td scope="col">Start Date</td>
						<td scope="col">Due Date</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					if(mysqli_num_rows($rs)) {
						while($data = mysqli_fetch_assoc($rs))
						{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$data[bug_id]?></td>
						<td><?=$data[bug_title]?></td>
						<td><?=$data[user_name]?></td>
						<td><?=$data[project_title]?></td>
						<td><?=$data[bt_title]?></td>
						<td><?=$data[bs_title]?></td>
						<td><?=$data[bug_start_date]?></td>
						<td><?=$data[bug_due_date]?></td>
						<td style="text-align:center"><a href="bug.php?bug_id=<?php echo $data[bug_id] ?>">Edit</a> | <a href="Javascript:delete_bug(<?=$data[bug_id]?>)">Delete</a> </td>
					  </tr>
					<?php 
						}  
					}
					else {
						echo "<tr><td colspan='7'>No bug record found !!!</td></tr>";
					}
					?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="bug_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
