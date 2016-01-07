<?php
class Searches extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Test_Cycles_factory');
        $this->load->library("pagination");
        $this->load->library('session');
    }

    public function date_search()
    {
        if ($this->input->post('search_date')) {
            $this->session->set_userdata('search_date', $this->input->post('search_date'));
            $search_date = $this->session->userdata('search_date');
        } else {
            $search_date = $this->session->userdata('search_date');
        }

        if ($_POST && !empty($search_date)) {

            $config = array();
            $config["base_url"] = base_url() . "searches/date_search";
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $statistics = $this->test_cycles_factory->getAllTestCyclesWithStatisticsPageByDate($config["per_page"], $page, $search_date);

            $config["total_rows"] = $this->test_cycles_factory->countAllTestCyclesWithStatisticsPageByDate($search_date);
            $this->pagination->initialize($config);

            foreach ($statistics as &$stat) {
                if ($stat['date_start'] != null && $stat['time_start'] != null && $stat['date_finish'] != null && $stat['time_finish'] != null) {
                    $datetime1 = strtotime($stat['date_start'] . ' ' . $stat['time_start']);
                    $datetime2 = strtotime($stat['date_finish'] . ' ' . $stat['time_finish']);
                    $interval = abs($datetime2 - $datetime1);
                    array_push($stat, strftime("%M:%S", $interval));
                } else {
                    array_push($stat, '');
                }
            }

            $data['statistics'] = $statistics;
            $data['links'] = $this->pagination->create_links();
            $data['search_date'] = $search_date;
            $this->show_view('searches/date_search', $data);
        } else {
            $this->session->set_flashdata('flash',array(
                'type' => 'failure',
                'msg' => 'An error occured performing the Search, please try again'
            ));
            redirect(base_url('/'), 'refresh');
        }
    }

    public function text_search()
    {
        if ($this->input->post('search_term')) {
            $this->session->set_userdata('search_term', $this->input->post('search_term'));
            $search_term = $this->session->userdata('search_term');
        } else {
            $search_term = $this->session->userdata('search_term');
        }

        if ($_POST && !empty($search_term)) {

            $config = array();
            $config["base_url"] = base_url() . "searches/text_search";
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


            //$data['statistics'] = $statistics;
            $data['links'] = $this->pagination->create_links();
            $data['search_term'] = $search_term;
            $this->show_view('searches/text_search', $data);
        } else {
            $this->session->set_flashdata('flash',array(
                'type' => 'failure',
                'msg' => 'An error occured performing the Search, please try again'
            ));
            redirect(base_url('/'), 'refresh');
        }
    }
}
