<?php 

	/*
	 * Form Validation
	 */
	
	function validate_input( $data ) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	/*
	 * Password Hashing
	 */
	function hashPassword( $password ) 
	{
		$options = [
	    'cost' => 12 // the default cost is 10
		];

	    $hashed_password = password_hash( $password, PASSWORD_DEFAULT, $options );
	    return $hashed_password;
	}


	/*
	 * Return role value
	 */
	function get_role( $role_id )
	{
		switch ( $role_id ) {
			case '4':
				return "Master Administrator";
				break;

			case '3':
				return "Administrator";
				break;

			case '2':
				return "Department Head";
				break;
			
			default:
				return "Staff";
				break;
		}

	}

	/*
	 * Request Status
	 */
	
	function request_status( $status_id )
	{
		switch ( $status_id ) {
			case '20':
				return "Rejected";
				break;

			case '30':
				return "Approved";
				break;

			default:
				return "Pending";
				break;
		}

	}


?>