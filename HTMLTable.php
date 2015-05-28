<html>
	<head>
		<title>
			HTML Table
		</title>
	</head>
	<body>
		<?php
			example1();
			example2();
			
			function example1(){
				$posts = array(
					array(
						'id' => 0,
						'title' => 'My First Entry',
						'created' => 1195073683,
						'date' => '2007-11-13',
					),
					array(
						'id' => 1,
						'title' => 'My Second Entry',
						'created' => 1195073623,
						'date' => '2007-11-14',
					),
				);
				
				html_table($posts);
			}
			
			function example2(){
				$posts = array(
					array(
						'id' => 0,
						'name' => 'Thomas',
						'modified' => 2390103923,
						'date' => '2009-6-10',
					),
					array(
						'id' => 1,
						'name' => 'Joseph',
						'modified' => 5495894385,
						'date' => '2000-8-13',
					),
				);
				
				html_table($posts);
			}
			
			//function to create a html table from an associative array
			function html_table($posts){
				$counter = 0;
				
				foreach($posts as $i => $values){
					//prints the table header once
					if($counter == 0){
						echo "<table border = 1>
							<thead>
								<tr>";
									foreach($values as $j => $value){
										echo "<th>$j</th>";
									}
						echo"<tr>
							</thead>
						<tbody>";
					}
					
					//prints the table rows
					echo "<tr>";
					foreach($values as $j => $value){							
						echo"<td>$value</td>";
					}
					
					echo "</tr>";
					
					$counter++;
				}
				
				echo"</tbody></table><br>";
			}
		?>
	</body>
</html>