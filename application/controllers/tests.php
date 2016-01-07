<?php

class Tests extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Tests_factory');
        $this->load->library('Test_Groups_factory');
    }

    public function view($id = 0) {
        if ($id > 0) {
            $test_entity = $this->tests_factory->getTestById($id);
            $data['test'] = $test_entity;
            $this->show_view('tests/view', $data);
        }
    }

    public function add() {
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            if ($this->form_validation->run('tests') == true) {
                $tests_entity = $this->tests_factory->create_new_tests_entity(
                    $_POST['data']['name'],
                    $_POST['data']['desc'],
                    $_POST['data']['location'],
                    $_POST['data']['testgroups'],
                    1, //hardcoded active state
                    $_POST['data']['priority']
                );
                $result = $tests_entity->commit();
                //redirect('/tests/view/' . $_POST['data']['testgroups'], 'refresh');
            }
        }
        $testgroup_entity = $this->test_groups_factory->getAllTestGroupsList();
        $data['testgroups'] = $testgroup_entity;
        $this->show_view('tests/add', $data);
    }

    public function edit($id = null) {
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            if ($this->form_validation->run('tests') == true) {
                $tests_entity = $this->tests_factory->create_new_tests_entity(
                    $_POST['data']['name'],
                    $_POST['data']['desc'],
                    $_POST['data']['location'],
                    $_POST['data']['testgroups'],
                    1, //hardcoded active state
                    $_POST['data']['priority']
                );
                $tests_entity->setId($_POST['data']['test_id']);
                $result = $tests_entity->commit();
                //redirect('/tests/view/' . $_POST['data']['testgroups'], 'refresh');
            }
        }
        $test_entity = $this->tests_factory->getTestById($id);
        $data['test'] = $test_entity;
        $test_groups_list = $this->test_groups_factory->getAllTestGroupsList();
        $data['testgroups'] = $test_groups_list;
        $this->show_view('tests/edit', $data);
    }
}
