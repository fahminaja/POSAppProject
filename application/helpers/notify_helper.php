<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	function notify($title, $messege, $type, $icon, $redirect)
	{
		$ci =& get_instance();
		$ci->session->set_flashdata('notify', true);
		$ci->session->set_flashdata('title', $title);
		$ci->session->set_flashdata('message', $messege);
		$ci->session->set_flashdata('type', $type);
		$ci->session->set_flashdata('icon', $icon);
		if ($redirect != null) { redirect(base_url($redirect));}
	}
 ?>