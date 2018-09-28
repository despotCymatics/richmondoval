<?php
/**
 * Template Name: Oval Fit Holding Page
 */


get_header();


?>


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
                    <!--<h5>LAUNCHING 2018 FALL</h5>-->
                    <h1>RIDE. PUSH. <br>REPEAT.</h1>
                </div>
                <div class="col-md-5">
                    <h5>
                        <img width="70px" style="display: inline-block; margin-right: 10px; vertical-align: middle;"
                             src="<?= get_stylesheet_directory_uri() ?>/images/stages/RIDE_logo.svg">
                        <span style="vertical-align: sub;">Train with power and precision</span>
                    </h5>
                    <p>
                        Achieve your fitness goals with our revolutionary RIDE classes. Train with the power and precision of elite cyclists on the Stages SC3 bikes and Stages Flight™ technology.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="ovalfit-holding-body">

        <div id="ovalfit-tabs">
            <ul>
                <li>
                    <a class="tab-btn1" href="#tabs-1">
                        <span>
                            Results based training
                        </span>
                    </a>
                </li>
                <li>
                    <a class="tab-btn2" href="#tabs-2">
                        <span>
                            Immersive studio
                    </a>
                    </span>
                </li>
                <li>
                    <a class="tab-btn3" href="#tabs-3">
                        <span>
                            Ultimate ride machine
                        </span>
                    </a>
                </li>
                <li>
                    <a class="tab-btn4" href="#tabs-4">
                        <span>
                            <!--<img src="<?/*= get_stylesheet_directory_uri() */?>/images/stages/MOVE_logo.svg"> -->
                            Ovalfit team
                        </span>
                    </a>
                </li>
            </ul>

            <div id="tabs-1">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/ride_bg.jpg">
                <img  class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/ride_bg-tablet.jpg">
                <span>Results based training</span>
            </div>

            <div id="tabs-2">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/studio.jpg">
                <img class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/studio-tablet.jpg">
                <span>Immersive studio</span>
            </div>

            <div id="tabs-3">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/bike.jpg">
                <img class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/bike-tablet.jpg">
                <span>Ultimate ride machine</span>
            </div>

            <div id="tabs-4">
                <img class="desktop" src="<?= get_stylesheet_directory_uri() ?>/images/stages/instructor.jpg">
                <img class="tablet" src="<?= get_stylesheet_directory_uri() ?>/images/stages/instructor-tablet.jpg">
                <span>Ovalfit team</span>
            </div>
        </div>

        <div class="within inner">
            <div class="ovalfit-form">

                <?=do_shortcode('[contact-form-7 id="47266" title="OvalFit - First to know"]'); ?>

            </div>
        </div>

    </div>

<?php

get_footer();