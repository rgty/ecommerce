<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
	<script src="jquery.bxslider.min.js"></script>
	<link href="jquery.bxslider.css" rel="stylesheet"/>
	<script>
		$(document).ready(function(){
			$(".cover").bxSlider({
				mode:'horizontal',
				auto:true,
				autoStart:true,
				slideWidth:1000,
				speed:800,
				minSlides:1,
				maxSlides:1,
				captions:true,
			});
			$(".cat").bxSlider({
				mode:'horizontal',
				slideWidth:750,
				speed:1000,
				minSlides:7,
				maxSlides:7,
			});
			// $('[title]').removeAttr('title');
		});
</script>
	</script>
</head>
<body>
<div class = "wrapper">
	<?php include 'include/header.php';
	$url = $_SERVER['PHP_SELF'];
	setcookie('current',$url,time()+5*60,"/");
	?>
	<div class="dynamic">
		<p id="caption">No one belongs here more than you.</p>
		<div id="top">
			<img title = "Sell Books Here" id = "ad1" src="Images/books.png">
			<ul class="cover">
			<li><a href=""><img  title = "<b>A Spool of Blue Thread</b> by <i>Anne Tyler</i>" 
				src="Images/top.jpg"></a></li>
			<li><a href="#" title="Top Books"><img  title = "<b>The Help</b>, <i>a novel</i>" 
				src="Images/top2007.jpg"></a></li>
			<li><a href=""><img  title = "<b>The Girl on the Train</b> by <i>Paula Hawkins</i>" 
				src="Images/top1.jpg"></a></li>
			<li><a href=""><img  title = "<b>First Frost</b> by <i>Sarah Addison Allen</i>" 
				src="Images/top2.jpeg"></a></li>
			</ul>
			<img title = "Buy Books Here" id = "ad2" src="Images/buy_books.jpg">
		</div>
		<span id="home_cat">
			<ul>
				<a href="search.php?cat=Arts / Photography"><li>Arts / Photography</li></a>
				<a href="search.php?cat=Biographies / Memoirs"><li>Biographies / Memoirs</li></a>
				<a href="search.php?cat=Business / Management"><li>Business / Management</li></a>
				<a href="search.php?cat=Children"><li>Children</li></a>
				<a href="search.php?cat=Cook Books / Food"><li>Cook Books / Food</li></a>
				<a href="search.php?cat=Computers / Technology"><li>Computers / Technology</li></a>
				<a href="search.php?cat=Comics / Novels"><li>Comics / Novels</li></a>
				<a href="search.php?cat=Crafts / Hobbies / Home"><li>Crafts / Hobbies / Home</li></a>
				<a href="search.php?cat=Dummies"><li>Dummies</li></a>
				<a href="search.php?cat=Education"><li>Education</li></a>
				<a href="search.php?cat=Engineering"><li>Engineering</li></a>
				<a href="search.php?cat=Health / Medicine"><li>Health / Medicine</li></a>
				<a href="search.php?cat=History"><li>History</li></a>
				<a href="search.php?cat=Literature / Fiction"><li>Literature / Fiction</li></a>
				<a href="search.php?cat=Politics / Government"><li>Politics / Government</li></a>
				<a href="search.php?cat=Science / Math"><li>Science / Math</li></a>
				<a href="search.php?cat=Science Fiction / Fantasy"><li>Science Fiction / Fantasy</li></a>
				<a href="search.php?cat=Religion / Spiritual"><li>Religion / Spiritual</li></a>
				<a href="search.php?cat=Sports / Outdoors"><li>Sports / Outdoors</li></a>
				<a href="search.php?cat=Travel"><li>Travel</li></a>
			</ul>
		</span>
		<div id = "home">
		<?php 
			include 'dbase/dbconn.php'; 
			$table = "old_book_details";
			$res = mysql_query("SELECT * FROM $table ORDER BY Category,Book_Name");
			if(mysql_num_rows($res) > 0){
				while($row = mysql_fetch_assoc($res)){
					if($cat != $row['Category'] || $set_count){
						$cat = $row['Category'];
						echo "<h2>$cat</h2><hr>";
						$count = 0;
						$set_count = false;
					}
					$url = $row['URL'];
					$isbn = $row['ISBN'];
					$name = $row['Book_Name'];
					$author = $row['Author'];
					if($count == 8){
						$set_count = true;
						continue;
					}
					echo "
					<a href = \"book/details.php?q=$isbn\">
					<img id = \"home_img\" title=\"$name by $author\" src = \"Images/$url\"></a>";
					$count++;
				}
			}
			mysql_close();
			?>
		</div>
	</div>
	<?php include 'include/footer.php';?>
</div>
</body>
</html></font>