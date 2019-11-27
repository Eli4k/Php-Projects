<?php

	$sub = $_POST['sub'];

		switch ($sub) {
			case 'ADD':
				header('Location: ../pages/addBook.php');
				break;

			case 'EDIT':
				$next=$id="";
				foreach ($_POST as $key=>$value) {
					if ($key!=='sub') {
						$id.=$next.$value;
						break;
					}
				}
				header('Location: ../pages/editBook.php?id='.$id);
				break;
			
			case 'DELETE':
			$id=$next=$src="";
					include '../config.php';
					foreach($_POST as $key=>$value){
						if ($key!=='sub'&& $key!=='dataTable_length') {
							$all=explode(",",$key);
							$id.=$next.$all[0];
							$src.=$next.$all[1];
							$next=",";
							$path = explode(",", $src);
							
								
							 foreach ($path as $value){
							 	if ($value!="uploads/iscon.php"){
										 unlink($value);
												}
											}
										 }										
									}
					header('location: deleteFileOpt.inc.php?id='.$id.'&&src='.$src);
						break;			
					}
					
				


 ?>