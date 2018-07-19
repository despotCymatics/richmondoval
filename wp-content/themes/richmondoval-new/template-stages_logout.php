<?php
/**
 * Template Name: Oval Fit Logout
 */

session_start();
if(session_destroy())
{
	header("Location: /oval-fit-login");
}