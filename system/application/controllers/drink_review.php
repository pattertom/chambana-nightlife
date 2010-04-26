<?php
class Drink_review extends Controller {

	function show_all()
	{
		$this->load->model('drink_review_model');
		$data['result'] = $this->drink_review_model->get_all_drink_reviews();
		$this->load->view('header');
		$this->load->view('drink_review/drink_review_view', $data);
		$this->load->view('footer');
	}
	
	function index()
	{
		$this->load->model('drink_review_model');
		$data['result'] = $this->drink_review_model->get_all_drink_reviews();
		$this->load->view('header');
		$this->load->view('drink_review/drink_review_view', $data);
		$this->load->view('footer');
	}

	function insert()
	{
		$this->load->view('header');
		$this->load->view('drink_review/drink_review_insert_form');
		$this->load->view('footer');
	}
	
	function create($name)
	{
		$this->load->model('drink_review_model');
        $user_name = $this->input->post('user_name');
        $drink_name = $this->input->post('drink_name');
		$approved_by_admin = $this->input->post('approved_by_admin');
        $rating = $this->input->post('rating');
        $review_content = $this->input->post('review_content');
		$review_content = nl2br($review_content);
		$review_content = quotes_to_entities($review_content);
        $ts = $this->input->post('ts');
        
		if($user_name && $drink_name && $approved_by_admin && $rating && $review_content && $ts) {
            $this->drink_review_model->create_drink_review($user_name, $drink_name, $approved_by_admin,
                                            $rating, $review_content, $ts);
		}
		else if($user_name && $drink_name && $rating && $review_content)
		{
			$this->drink_review_model->create_drink_review_simple($user_name, $drink_name, $rating, $review_content);
		}
		$data['result'] = $this->drink_review_model->get_all_drink_reviews();
		redirect('Drink/view_drink_reviewed/'.$name);
	}
	
	function delete($id)
	{
		$this->load->model('drink_review_model');
		if($this->session->userdata('admin')) $this->drink_review_model->delete_drink_review($id);
		$data['result'] = $this->drink_review_model->get_all_drink_reviews();
		redirect('dashboard/adminApprovals');
	}
	
	function approve($id)
	{
		$this->load->model('drink_review_model');
		$this->drink_review_model->approve_drink_review($id);
		$data['result'] = $this->drink_review_model->get_all_drink_reviews();
		redirect('dashboard/adminApprovals');
	}
	
	function search($name)
	{
		$this->load->model('drink_review_model');
		$data['result'] = $this->drink_review_model->search_drink_review($name);
		$this->load->view('header');
		$this->load->view('drink_review/drink_review_view', $data);
		$this->load->view('footer');
	}
}
?>