<?php
class Image extends Controller {

	function show_all()
	{
        
	}
	
	function index()
	{
        
	}

	function insert()
	{
        
	}
	
	function display($id)
	{
		$this->load->model('image_model');
		$data['result'] = $this->image_model->get_image($id);
		$this->load->view('image/display_image', $data);
	}
}
?>