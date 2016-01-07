<?php
$config = array(
    'tests' => array(
        array(
            'field' => 'data[name]',
            'label' => 'Name',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'data[desc]',
            'label' => 'Description',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'data[location]',
            'label' => 'Location',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'data[testgroups]',
            'label' => 'Test Group',
            'rules' => 'required',
        ),
        array(
            'field' => 'data[priority]',
            'label' => 'Priority',
            'rules' => 'trim|required',
        )
    ),
    'test_groups' => array(
        array(
            'field' => 'data[group_name]',
            'label' => 'Name',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'data[group_tags]',
            'label' => 'Tags',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'data[priority]',
            'label' => 'Priority',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'data[group_desc]',
            'label' => 'Description',
            'rules' => 'trim|required',
        )
    )
);
