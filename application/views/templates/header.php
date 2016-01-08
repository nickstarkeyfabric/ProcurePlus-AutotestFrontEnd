<html>
<head>
    <title>Autotest Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>" />
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/global.js')?>"></script>

    <?php if(isset($scripts)) : foreach($scripts as $script) : ?>
    <script src="<?php echo base_url($script)?>"></script>
    <?php endforeach; endif; ?>

    <script type="text/javascript">
        $( document ).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('/'); ?>">Autotests</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/">Test History</a></li>
                    <li><a href="/test_groups/view">Test Manager</a></li>
                </ul>
                <form action="/searches/text_search" role="search" class="navbar-form navbar-right" autocomplete="off" method="POST">
                    <div class="form-group">
                        <input type="text" name="search_term" id="search" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php echo flash($this->session->flashdata('flash')); ?>
        <div id="flash-message"></div>
