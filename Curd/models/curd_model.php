<?php
class Crud_model extends CI_Model 
{
	function saverecords($name,$email,$phone,$city)
	{
		$query="INSERT INTO `crud`( `name`, `email`, `phone`, `city`) 
		VALUES ('$name','$email','$phone','$city')";
		$this->db->query($query);
	}
}