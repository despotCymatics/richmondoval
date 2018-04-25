<?php

//lock events for non logged in users
if (tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' )) {

    session_start();
    session_name('eventsLogSession');

    $usr = 'roevents';
    $pass = 'events2016';

    if(isset($_POST['username']) && isset($_POST['password'])) {

        $_SESSION['usr'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];
    }

    if(isset($_SESSION['usr']) && isset($_SESSION['pass'])) {

        if($_SESSION['usr'] == $usr && $_SESSION['pass'] == $pass) {

        }else {
            echo displayForm();
            exit();
        }

    } else {

        echo displayForm();
        exit;
    }

}

function displayForm() {
    return '
    <style type="text/css">
    .loginForm {
        font-family: "Helvetica Neue", Arial, Verdana, "Nimbus Sans L", sans-serif;
    }
    .loginForm {
        margin: 40px auto;
        display: block;
        max-width: 500px;
        padding: 20px 10px;
        text-align: center;
        background: #eee;
    }
    .loginForm input {
        line-height: 30px;
        width: 260px;
        border: 1px solid #ddd;
        padding: 0 10px;
    }
    .loginForm button {
        background: #f8a51a;
        border: none;
        padding: 10px 40px;
        color: white;
        border-radius: 3px;
        font-weight: 600;
        margin-bottom: 20px;
        cursor: pointer;
    }
    </style>
    <div class="loginForm">
        <img width="100px" src="/wp-content/themes/richmondoval/images/basic/logo.png" alt="Site name">
        <h2>This is restricted page, please login:</h2>
        <form action="" method="post">
            <p><input name="username" type="text" placeholder="Username"/></p>
            <p></p><input name="password" type="password" placeholder="Password"/><br></p>
            <button>Login</button>
        </form>
       </div>';

}

?>