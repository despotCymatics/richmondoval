<?php
/**
 * Template Name: Oval Fit Holding Page
 */


get_header();


?>

    <style>
        @import url("https://use.typekit.net/jrr5dxu.css");
    </style>

    <div class="within inner">
        <div class="content">
            <div class="title">
                <br>
                <img width="120" class="stages-logo"
                     src="<?= get_stylesheet_directory_uri() ?>/images/basic/oval-fit-logo.png">
                <br>
                <br>
            </div>

            <div class="row header">
                <div class="col-md-7">
                    <h5>COMING 2018 FALL</h5>
                    <h1>DISCOVER THE CHAMPION IN YOU</h1>
                </div>
                <div class="col-md-4">
                    <h5>FINESS REVAMPED</h5>
                    <p>
                        Accelerate your fitness journey at the Richmond Olympic Oval - a world-class, Olympic legacy facility. OVALfit is a complete training experience with inspiring, immersive programs to condition your mind, body, and spirit.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="ovalfit-holding-body">

        <div id="ovalfit-tabs">
            <ul>
                <li><a class="tab-btn1" href="#tabs-1"><span><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/RIDE_logo.svg"> Ride. Push. Repeat</span></a></li>
                <li><a class="tab-btn2" href="#tabs-2"><span><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/FLOW_logo.svg"> Breathe in. breathe out</a></span></li>
                <li><a class="tab-btn3" href="#tabs-3"><span><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/LIFT_logo.svg"> The science of lift off</span></a></li>
                <li><a class="tab-btn4" href="#tabs-4"><span><img src="<?= get_stylesheet_directory_uri() ?>/images/stages/MOVE_logo.svg"> Keep it moving</span></a></li>
            </ul>

            <div id="tabs-1">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/ride_bg.jpg">
                <img  class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/ride_bg-tablet.jpg">
            </div>

            <div id="tabs-2">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/flow_bg.jpg">
                <img class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/flow_bg-tablet.jpg">
            </div>

            <div id="tabs-3">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/trx_bg.jpg">
                <img class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/trx_bg-tablet.jpg">
            </div>

            <div id="tabs-4">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/move_bg.jpg">
                <img class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/move_bg-tablet.jpg">
            </div>
        </div>

        <div class="within inner">
            <div class="ovalfit-form">
                <h5>Be the first to know</h5><br>
                <form>
                    <input type="text" placeholder="First Name" required>
                    <input type="text" placeholder="Last Name" required>
                    <input type="email" placeholder="Email" required>
                    <span>Do you have an existing gym membership?</span>
                    <br><br>
                    <select>
                        <option>Gym membership 1</option>
                        <option>Gym membership 2</option>
                        <option>Gym membership 3</option>
                    </select>

                    <input type="checkbox" name="" checked> <span>I want to know what's happening at the Richmond Olympic Oval</span>
                    <br>
                    <br>

                    <button class="btn orange">Notify Me</button>

                </form>
            </div>
        </div>

    </div>




<?php

get_footer();