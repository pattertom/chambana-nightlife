<?php
class BarReview extends Controller {

	function show_all()
	{
		$this->load->model('BarReview_model');
		$data['result'] = $this->BarReview_model->get_all_barreviews();
		$this->load->view('header');
		$this->load->view('BarReview/BarRevew_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('BarReview_model');
		$data['result'] = $this->BarReview_model->get_all_barreviews();
		$this->load->view('header');
		$this->load->view('BarReview/BarReview_view', $data);
		$this->load->view('footer');
	}

	function insert()
	{
		$this->load->view('header');
		$this->load->view('BarReview/BarReview_insert_form');
		$this->load->view('footer');
	}
	
	function create()
	{
		$this->load->model('BarReview_model');
        $userName = $this->input->post('userName');
        $barName = $this->input->post('barName');
		$approvedByAdmin = $this->input->post('approvedByAdmin');
        $rating = $this->input->post('rating');
        $reviewContent = $this->input->post('reviewContent');
        $ts = $this->input->post('ts');
        
		if($userName && $barName && $approvedByAdmin && $rating && $reviewContent && $ts) {
            $this->BarReview_model->create_barreview($userName, $barName, $approvedByAdmin,
                                            $rating, $reviewContent, $ts);
		}
		$data['result'] = $this->BarReview_model->get_all_barreviews();
		$this->load->view('header');
		$this->load->view('BarReview/BarReview_view', $data);
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