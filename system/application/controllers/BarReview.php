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
	
	function create($name)
	{
		$this->load->model('BarReview_model');
        $userName = $this->input->post('userName');
        $barName = $this->input->post('barName');
		$approvedByAdmin = $this->input->post('approvedByAdmin');
        $rating = $this->input->post('rating');
        $reviewContent = $this->input->post('reviewContent');
		$reviewContent = nl2br($reviewContent);
		$reviewContent = quotes_to_entities($reviewContent);
        $ts = $this->input->post('ts');
        
		if($userName && $barName && $approvedByAdmin && $rating && $reviewContent && $ts) {
            $this->BarReview_model->create_barreview($userName, $barName, $approvedByAdmin,
                                            $rating, $reviewContent, $ts);
		}
		else if($userName && $barName && $rating && $reviewContent)
		{
			$this->BarReview_model->create_barreview_simple($userName, $barName, $rating, $reviewContent);
		}
		$data['result'] = $this->BarReview_model->get_all_barreviews();
		redirect('bar/viewBarReviewed/'.$name);
	}
	
	function delete($id)
	{
		$this->load->model('BarReview_model');
		if($this->session->userdata('admin')) $this->BarReview_model->delete_barreview($id);
		$data['result'] = $this->BarReview_model->get_all_barreviews();
		redirect('dashboard/adminApprovals');
	}
	
	function approve($id)
	{
		$this->load->model('BarReview_model');
		$this->BarReview_model->approve_barreview($id);
		$data['result'] = $this->BarReview_model->get_all_barreviews();
		redirect('dashboard/adminApprovals');
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