<?php
	include('../conn.php');
	if(isset($_POST['fetch'])){
		$id = $_POST['id'];
		
		$query=mysqli_query($conn,"select * from `chat` left join `user` on user.userid=chat.userid where chatroomid='$id' order by chat_date asc") or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		?>	
		<div>
			<img src="../usericon.png" style="height:30px; width:30px; position:relative; top:15px; left:10px;">
			<span style="font-size:11px; position:relative; top:7px; left:15px;"><strong><?php echo $row['username']; ?></strong>: <?php echo $row['message']; ?></span><br>
			<span style="font-size:10px; position:relative; top:-2px; left:50px;"><i><?php echo date('M-d-Y h:i A',strtotime($row['chat_date'])); ?></i></span><br>
		</div>
		<div style="height:5px;"></div>
		<?php
		}
	}	
?>