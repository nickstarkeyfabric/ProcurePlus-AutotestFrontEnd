<?php

class Test_cycles extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Test_Cycles_factory');
        //$this->load->library('Test_Runs_factory');
        $this->load->library("pagination");
        $this->load->helper("url");
    }

    public function index()
    {
        $config = array();
        $config["base_url"] = base_url() . "test_cycles/index";
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //$statistics = $this->test_cycles_factory->getAllTestCyclesWithStatistics();
        $most_recent_statistics = $this->test_cycles_factory->getTheMostRecentTestCycleStatistics();
        $statistics = $this->test_cycles_factory->getAllTestCyclesWithStatisticsPage($config["per_page"], $page);

        $config["total_rows"] = $this->test_cycles_factory->countAllTestCyclesWithStatisticsPage();
        $this->pagination->initialize($config);

        foreach ($most_recent_statistics as &$stat) {
            if ($stat['date_start'] != null && $stat['time_start'] != null &&
                $stat['date_finish'] != null && $stat['time_finish'] != null) {
                $datetime1 = strtotime($stat['date_start'] . ' ' . $stat['time_start']);
                $datetime2 = strtotime($stat['date_finish'] . ' ' . $stat['time_finish']);
                $interval = abs($datetime2 - $datetime1);
                array_push($stat, strftime("%M:%S", $interval));
            } else {
                array_push($stat, '');
            }
        }

        foreach ($statistics as &$stat) {
            if ($stat['date_start'] != null && $stat['time_start'] != null &&
                $stat['date_finish'] != null && $stat['time_finish'] != null) {
                $datetime1 = strtotime($stat['date_start'] . ' ' . $stat['time_start']);
                $datetime2 = strtotime($stat['date_finish'] . ' ' . $stat['time_finish']);
                $interval = abs($datetime2 - $datetime1);
                array_push($stat, strftime("%M:%S", $interval));
            } else {
                array_push($stat, '');
            }
        }
        $data['most_recent_statistics'] = $most_recent_statistics;
        $data['statistics'] = $statistics;
        $data['links'] = $this->pagination->create_links();
        $this->show_view('test_cycles/index', $data);
    }

    public function view($id)
    {
        $test_group_statistics = $this->test_cycles_factory->getTestGroupsStatisticsByTestCycleId($id);
        $data['id'] = $id;
        $data['test_group_statistics'] = $test_group_statistics;
        $this->show_view('test_cycles/view', $data);
    }

    public function searchByTags(string $tags)
    {

    }
}
