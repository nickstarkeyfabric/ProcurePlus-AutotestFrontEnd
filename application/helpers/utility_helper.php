<?php
function getTestCycleTestStats($test_cycle_groups = array()) {
    $totals = array(
        'passes' => 0,
        'fails' => 0,
    );
    foreach ($test_cycle_groups as $group) {
        $totals['passes'] += $group['passes'];
        $totals['fails'] += $group['fails'];
    }
    return $totals;
}
if( !function_exists('flash') )
{
    /**
     * Prints out Flash messages
     * @param mixed $flash
     * @return string
     */
    function flash($flash) {
        $return = '';
        if(!empty($flash)) {
            if(is_array($flash)) {
                $class = '';
                if(isset($flash['type'])) {
                    switch($flash['type']) {
                        case 'success':
                            $class = 'alert-success';
                            break;
                        case 'failure':
                            $class = 'alert-danger';
                            break;
                        default:
                            $class = 'alert-info';
                            break;
                    }
                }
                if(isset($flash['msg'])) {
                $return = "<div class='alert {$class}'>".$flash['msg']."</div>";
                }
            } else {
                $return = "<div class='alert alert-info'>{$flash}</div>";
            }
        }
    return $return;
    }
}
