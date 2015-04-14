<?php
    if (!defined('SYSTEM_ID')) { define('SYSTEM_ID', 1); }
    if (!defined('GROUP_ADMIN')) { define('GROUP_ADMIN', 1);}
    if (!defined('GROUP_MEMBER')) {define('GROUP_MEMBER', 2);}
    if (!defined('GENDER_MALE')) {define('GENDER_MALE', 1);}
    if (!defined('GENDER_FEMALE')) {define('GENDER_FEMALE', 2);}

    $config['S'] = array(
        'User' => array(
            'group' => array(
                GROUP_ADMIN => __('Admin'),
                GROUP_MEMBER => __('Member')
            ),
            'gender' => array(
                GENDER_MALE => __('Male'),
                GENDER_FEMALE => __('Female')
            )
        ),
        'System' => array(
            'active' => array(
                1 => __('true'),
                0 => __('false')
            )
        )
    );
?>