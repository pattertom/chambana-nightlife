<?php
class BarSpecial extends Controller {

	function show_all()
	{
		$this->load->model('BarSpecial_model');
		$data['result'] = $this->BarSpecial_model->get_all_barspecials();
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('BarSpecial_model');
		$data['result'] = $this->BarSpecial_model->get_all_barspecials();
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_view', $data);
		$this->load->view('footer');
	}

	function insert()
	{
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_insert_form');
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('BarSpecial_model');
        $barName = $this->input->post('barName');
		$isWeekly = $this->input->post('isWeekly');
		$weeklyDay = $this->input->post('weeklyDay');
        $description = $this->input->post('description');
        $ts = $this->input->post('ts');
        
		if($barName && $description) {
            $this->BarSpecial_model->create_barspecial($barName, $isWeekly,
                                            $weeklyDay, $description, $ts);
		}
		$data['result'] = $this->BarSpecial_model->get_all_barspecials();
		$this->load->view('header');
		$this->load->view('BarSpecial/BarSpecial_view', $data);
		$this->load->view('footer');
	}
	
	function delete($id)
	{
		$this->load->model('BarReview_model');
		$this->BarReview_model->delete_barreview($id);
		$data['result'] = $this->BarReview_model->get_all_barreviews();
		$this->load->view('header');
		$this->load->view('BarReview/BarReview_view', $data);
		$this->load->view('footer');
	}
	
	function search($name)
	{
		$this->load->model('BarReview_model');
		$data['result'] = $this->BarReview_model->search_barreview($name);
		$this->load->view('header');
		$this->load->view('BarReview/BarReview_view', $data);
		$this->load->view('footer');
	}
}
?>