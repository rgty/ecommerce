<html>
<head><title>Search Results</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="wrapper">
<?php include 'include/header.php';?>
<div class="dynamic">
	<span id="home_cat" style="margin-top:27px;">
		<h3>Categories</h3>
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
	<div align="center">
	<?php include 'dbase/dbconn.php';
	$table = "old_book_details";
	$categories = array(
	"Arts / Photography",
	"Biographies / Memoirs",
	"Business / Management",
	"Children",
	"Cook Books / Food",
	"Computers / Technology",
	"Comics / Novels",
	"Crafts / Hobbies / Home",
	"Dummies",
	"Education",
	"Engineering",
	"Health / Medicine",
	"History",
	"Literature / Fiction",
	"Science / Math",
	"Science Fiction / Fantasy",
	"Politics / Government",
	"Religion / Spiritual",
	"Sports / Outdoors",
	"Travel"
	);
	$string = trim($_GET['q']);
	$cat = $_GET['cat'];
	if(in_array($cat,$categories)){
		$query = mysql_query("SELECT * FROM $table WHERE Category = '$cat' GROUP BY Book_Name");
	}
	else if($string != null){
		$query = mysql_query("SELECT * FROM $table GROUP BY Book_Name");
	}
	else{
		echo "<p style=\"text-shadow:0px 0px 1px gray;color:blue;font-size:14px;\">Try 'Book Title' or 'Author' for better results</p>";
		exit();
	}
	//start searching database
	if($string != null)
		search($string,$cat,$query);
	else
		relatedSearch($cat,$query);

	function search($string,$cat,$query){
		$donts = array("the","and","an","a","as","is","was");
		$knot = array_unique(explode(' ',$string));
		$done = array();
		$hash = array();
		if(mysql_num_rows($query) != 0){
			while($row = mysql_fetch_assoc($query)){
				$isbn = $row['ISBN'];
				$book = array_unique(explode(' ',$row['Book_Name']));
				$author = array_unique(explode(' ',$row['Author']));
				foreach($knot as $key){
					$key = strtolower($key);
					
					//eliminating repeated strings and 'the','and' etc
					if($key == null or in_array($key,$donts))
						continue;

					//for each token in author name
					foreach($author as $a){
						//regular exp
						eregi('[a-zA-z0-9]+',$a,$var);
						$a = $var[0];
						if(strcasecmp($key,$a) == 0){
							if(array_key_exists($isbn,$hash))
								$hash[$isbn] += 1;
							else $hash[$isbn] = 1;
							array_push($done,$key);
						}
					}
					
					//for each token in book name
					foreach($book as $b){
						//regular exp
						eregi('[a-zA-z0-9]+',$b,$var);
						$b = $var[0];
						if(strcasecmp($key,$b) == 0){
							if(array_key_exists($isbn,$hash))
								$hash[$isbn] += 1;
							else $hash[$isbn] = 1;
							array_push($done,$key);
						}
					}
				}
			}
			arsort($hash);
		}
		echo "<br><hr><div style=\"text-shadow:0px 0px 0.1px gray;font-size:14px;\">Results for <q>$string</q></div>";
		display($hash);
	}
	function display($hash){
		$keys = array_keys($hash);
		$flag = 0;
		foreach ($keys as $key) {
			$sql = mysql_query("SELECT * FROM old_book_details WHERE ISBN='$key'");
			if(mysql_num_rows($sql) != 0){
				$flag = 1;
				while($row = mysql_fetch_assoc($sql)){
					$isbn = $row['ISBN'];
					$name = $row['Book_Name'];
					$author = $row['Author'];
					$image = $row['URL'];
					echo 
					"<div class = \"book\">
						<a href = \"book/details.php?q=$isbn\">
						<img src=\"Images/$image\">
						</a>
						<p class = \"subtle\">
						<a href = \"book/details.php?q=$isbn\">$name</a> 
						by 
						<a href = \"#\">$author</a>
						(#$hash[$key])</p>
					</div>";
				}
			}
		}
		if(!$flag){
			echo "<p style = \"text-shadow:0px 0px 1px gray;color:blue;font-size:14px;\">No results found.</p>";
		}
	}
	function relatedSearch($cat,$query){
		$hash = array();
		if(mysql_num_rows($query) != 0){
			while($row = mysql_fetch_assoc($query)){
				$hash[$row['ISBN']] = $row['ISBN'];
			}
		}
		echo "<br><hr><div style=\"text-shadow:0px 0px 0.1px gray;font-size:14px;\">$cat</div>";
		display($hash);
	}
?>
</div>
</div>
	<?php include 'include/footer.php';?>
</div>
</body>
</html>