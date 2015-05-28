<html>
	<head>
		<title>
			HTML Dropdown
		</title>
	</head>
	<body>
		<?php			
			dropdown(
				array(
				'WA' => 'Washington',
				'OR' => 'Oregon',
				'CA' => 'California'
				), 'WA', 'state'
			);
			
			//function to create a dropdown from an associative array
			function dropdown($associative_array, $selected_key, $state_name){
				echo "<select name=$state_name>";
				foreach($associative_array as $key => $value){
					if($key == $selected_key){
						//creates the selected option
						echo "<option value=\"$key\" selected=\"selected\">$value</option>";
					}
					else{
						//creates the other options
						echo "<option value=\"$key\">$value</option>";
					}
				}
				
				echo "</select>";
			}
		?>
	</body>
</html>