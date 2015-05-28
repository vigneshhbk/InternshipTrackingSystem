<html>
	<head>
		<title>
			Associative Explode
		</title>
	</head>
	<body>
		<?php			
			example1();
			example2();
			
			function example1(){
				print_r(associative_explode(';', '||', '0;1;2||Horton;Tizzy;Hooey'));
			}
			
			function example2(){
				print_r(associative_explode(';', '||', 'name;species||Horton;Elephant'));
			}
			
			//function to convert a string into an associative array
			function associative_explode($glue, $separator, $str){
				$keys_and_values = explode($separator, $str);
				$keys = explode($glue, $keys_and_values[0]); //holds keys
				$values = explode($glue, $keys_and_values[1]); //holds values
				
				//associative array created using the keys and values from the input string
				$final_array = array();
				if(count($keys) == count($values)){
					for($i = 0; $i < count($keys); $i++){
						$final_array[$keys[$i]] = $values[$i];
					}
				}
				
				return $final_array;
			}
		?>
	</body>
</html>