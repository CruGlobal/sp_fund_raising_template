<?php

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}


function optionsframework_options() {


	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Project Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Total Goal Amount', 'options_framework_theme'),
		'desc' => __('Enter the total amount you are raising.', 'options_framework_theme'),
		'id' => 'spkick_goal',
		'std' => '0.00',
		'class' => 'mini',
		'type' => 'text');
		
  $options[] = array(
		'name' => __('Amount Raised', 'options_framework_theme'),
		'desc' => __('Enter the amount you&rsquo;ve raised so far', 'options_framework_theme'),
		'id' => 'spkick_current_amount',
		'std' => '0.00',
		'class' => 'mini',
		'type' => 'text');
		
  $options[] = array(
		'name' => __('Donation End Date', 'options_framework_theme'),
		'desc' => __('This is typically the day given to you by Cru staff as your donation deadline', 'options_framework_theme'),
		'id' => 'spkick_deadline',
		'std' => '12/21/2012',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Mission Trip Name', 'options_framework_theme'),
		'desc' => __('Title of your trip (eg. East Asia Stint)', 'options_framework_theme'),
		'id' => 'spkick_tripname',
		'std' => 'My Summer Mission Trip',
		'type' => 'text');

	$options[] = array(
		'name' => __('Mission Trip Summary', 'options_framework_theme'),
		'desc' => __('Enter a description of your trip in roughly one paragraph.', 'options_framework_theme'),
		'id' => 'spkick_description',
		'std' => "Example: We'll be going to an exciting part of the world to share our faith with students and various faculty. I'm excited at the possibility to share in a language I don't speak",
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Project Image', 'options_framework_theme'),
		'desc' => __('This image will be shown on the main page of your SP website. Feel free to use any size image bigger 608px X 52px.', 'options_framework_theme'),
		'id' => 'spkick_project_image',
		'type' => 'upload');
		
  $options[] = array(
		'name' => __('Project Video', 'options_framework_theme'),
		'desc' => __('A video is cooler than a project image. If you shoot a video of yourself describing your trip, upload it to youtube and paste the url here.', 'options_framework_theme'),
		'id' => 'spkick_video_url',
		'std' => 'Enter your YouTube URL',
		'type' => 'text');

	$options[] = array(
		'name' => __('Your Name', 'options_framework_theme'),
		'desc' => __('Please :-)', 'options_framework_theme'),
		'id' => 'spkick_person_name',
		'std' => 'Merdigal Magilicutootles',
		'type' => 'text');
		
  $options[] = array(
		'name' => __('Your Occupation', 'options_framework_theme'),
		'desc' => __('Student? Part-Time Dancer?', 'options_framework_theme'),
		'id' => 'spkick_person_subtext',
		'std' => 'Student at Cal State Hayward',
		'type' => 'text');

  $options[] = array(
		'name' => __('Your Bio', 'options_framework_theme'),
		'desc' => __('2 - 3 paragraphs', 'options_framework_theme'),
		'id' => 'spkick_person_bio',
		'std' => 'Keep us engaged!',
		'type' => 'textarea');
  
  $options[] = array(
		'name' => __('Your Picture', 'options_framework_theme'),
		'desc' => __('This will get turned into a square.', 'options_framework_theme'),
		'id' => 'spkick_person_image',
		'type' => 'upload');
		

	$options[] = array(
		'name' => __('Project Details', 'options_framework_theme'),
		'desc' => __('The information below is required for your site to work. If you dont have these details, contact your project coordinator to get them.', 'options_framework_theme'),
		'type' => 'info');

	
	
	$options[] = array(
		'name' => __('Designation Number', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'spkick_designation',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
  $options[] = array(
		'name' => __('Motivation Code', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'spkick_motivation',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	return $options;
}