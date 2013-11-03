<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = 'Road Fighter Theme';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = roadfighter_get_option('of_options');
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        //Stylesheet Reader
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_template_directory_uri() . '/images/';

        $options = array(
            array("name" => __("General Settings",'rdf'),
                "type" => "heading"),
            array("name" => __("Custom Logo",'rdf'),
                "desc" => __("Upload a logo for your Website. The recommended size for the logo is 200px width x 50px height.",'rdf'),
                "id" => "roadfighter_logo",
                "type" => "upload"),
            array("name" => __("Custom Favicon",'rdf'),
                "desc" => __("Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",'rdf'),
                "id" => "roadfighter_favicon",
                "type" => "upload"),
            //Background Image
//        array("name" => "Background Image",
//            "desc" => "Choose a suitable background image that will complement your website.",
//            "id" => "roadfighter_bodybg",
//            "type" => "upload"),
            array("name" => __("Top Right Contact Details",'rdf'),
                "desc" => __("Mention the contact details here which will be displayed on the top right corner of Website.",'rdf'),
                "id" => "roadfighter_topright",
                "std" => __("For Reservation Call : 1.888.222.5847",'rdf'),
                "type" => "textarea"),
            array("name" => __("Contact Number For Tap To Call Feature",'rdf'),
                "desc" => __("Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.",'rdf'),
                "id" => "roadfighter_contact_number",
                "std" => "5551234567",
                "type" => "text"),
            array("name" => __("Tracking Code",'rdf'),
                "desc" => __("Paste your Google Analytics (or other) tracking code here.",'rdf'),
                "id" => "roadfighter_analytics",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Front Page On/Off",'rdf'),
                "desc" => __("If the front page option is active then home page will appear otherwise blog page will display.",'rdf'),
                "id" => "re_nm",
                "std" => "on",
                "type" => "radio",
                "options" => $file_rename),
            //Home Page Slider Setting
            array("name" => __("Home Page Top Feature",'rdf'),
                "type" => "heading"),
            //First Slider
            array("name" => __("Top Feature Image",'rdf'),
                "desc" => __("The optimal size of the image is 1920 px wide x 860 px height, but it can be varied as per your requirement.",'rdf'),
                "id" => "roadfighter_slideimage1",
                "std" => "",
                "type" => "upload"),
            array("name" => __("Top Feature Heading",'rdf'),
                "desc" => __("Mention the heading for the Top Feature.",'rdf'),
                "id" => "roadfighter_sliderheading1",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Link for Top Feature",'rdf'),
                "desc" => __("Mention the URL for top image.",'rdf'),
                "id" => "roadfighter_Sliderlink1",
                "std" => "",
                "type" => "text"),
            array("name" => __("Top Feature Description",'rdf'),
                "desc" => __("Here mention a short description for the Top Feature heading.",'rdf'),
                "id" => "roadfighter_sliderdes1",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Link Text for First slider",'rdf'),
                "desc" => __("Mention the link text for first slider.",'rdf'),
                "id" => "roadfighter_slider_button1",
                "std" => "",
                "type" => "text"),
            //Homepage Feature Area
            array("name" => __("Homepage Feature Area",'rdf'),
                "type" => "heading"),
            array("name" => __("Home Page Main Heading",'rdf'),
                "desc" => __("Mention the punch line for your business here.",'rdf'),
                "id" => "roadfighter_page_main_heading",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Home Page Sub Heading",'rdf'),
                "desc" => __("Mention the tagline for your business here that will complement the punch line.",'rdf'),
                "id" => "roadfighter_page_sub_heading",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Three Column Feature Starts From Here",'rdf'),
                "type" => "saperate",
                "class" => "saperator"),
            //***Code for First Feature Feature***//
            array("name" => __("First Feature Column Heading",'rdf'),
                "desc" => __("Here mention the heading for the First column.",'rdf'),
                "id" => "roadfighter_headline1",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("First Feature Column Image",'rdf'),
                "desc" => __("Upload the image for the First column. Specified size is 313px width x 172px height.",'rdf'),
                "id" => "roadfighter_fimg1",
                "std" => "",
                "type" => "upload"),
            array("name" => __("First Feature Column Description",'rdf'),
                "desc" => __("Mention the short description for the First feature column.",'rdf'),
                "id" => "roadfighter_feature1",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("First Feature Link URL",'rdf'),
                "desc" => __("Mention the URL here to link the image to any pages.",'rdf'),
                "id" => "roadfighter_link1",
                "std" => "",
                "type" => "text"),
//***Code for second Feature***//
            array("name" => __("Second Feature Column Heading",'rdf'),
                "desc" => __("Here mention the heading for the Second column.",'rdf'),
                "id" => "roadfighter_headline2",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Second Feature Column Image",'rdf'),
                "desc" => __("Upload the image for the Second column. Specified size is 313px width x 172px height.",'rdf'),
                "id" => "roadfighter_fimg2",
                "std" => "",
                "type" => "upload"),
            array("name" => __("Second Feature Column Description",'rdf'),
                "desc" => __("Mention the short description for the Second feature column.",'rdf'),
                "id" => "roadfighter_feature2",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Second Feature Link URL",'rdf'),
                "desc" => __("Mention the URL here to link the image to any pages.",'rdf'),
                "id" => "roadfighter_link2",
                "std" => "",
                "type" => "text"),
//***Code for third Feature***//	
            array("name" => __("Third Feature Column Heading",'rdf'),
                "desc" => __("Here mention the heading for the Third column.",'rdf'),
                "id" => "roadfighter_headline3",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Third Feature Column Image",'rdf'),
                "desc" => __("Upload the image for the Third column. Specified size is 313px width x 172px height.",'rdf'),
                "id" => "roadfighter_fimg3",
                "std" => "",
                "type" => "upload"),
            array("name" => __("Third Feature Column Description",'rdf'),
                "desc" => __("Mention the short description for the Third feature column.",'rdf'),
                "id" => "roadfighter_feature3",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Third Feature Link URL",'rdf'),
                "desc" => __("Mention the URL here to link the image to any pages.",'rdf'),
                "id" => "roadfighter_link3",
                "std" => "",
                "type" => "text"),
            array("name" => __("Home Page Tagline Starts From Here",'rdf'),
                "type" => "saperate",
                "class" => "saperator"),
            array("name" => __("Home Page Tagline",'rdf'),
                "desc" => __("Mention the text for home page tagline.",'rdf'),
                "id" => "roadfighter_tag_head",
                "std" => "",
                "type" => "textarea"),
            array("name" => __("Home Page Button Text",'rdf'),
                "desc" => __("Mention the text for home page button.",'rdf'),
                "id" => "roadfighter_homepage_button",
                "std" => "",
                "type" => "text"),
            array("name" => __("Home Page Button Link",'rdf'),
                "desc" => __("Mention the text for home page button link.",'rdf'),
                "id" => "roadfighter_homepage_button_link",
                "std" => "",
                "type" => "text"),
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
            array("name" => __("Styling Options",'rdf'),
                "type" => "heading"),
            array("name" => __("Custom CSS",'rdf'),
                "desc" => __("Quickly add your custom CSS code to your theme by writing the code in this block.",'rdf'),
                "id" => "roadfighter_customcss",
                "std" => "",
                "type" => "textarea"),
//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//
            array("name" => __("Social Icons",'rdf'),
                "type" => "heading"),
            array("name" => __("Facebook URL",'rdf'),
                "desc" => __("Mention the URL of your Facebook here.",'rdf'),
                "id" => "roadfighter_facebook",
                "std" => "#",
                "type" => "text"),
            array("name" => __("Twitter URL",'rdf'),
                "desc" => __("Mention the URL of your Twitter here.",'rdf'),
                "id" => "roadfighter_twitter",
                "std" => "#",
                "type" => "text"),
            array("name" => __("RSS URL",'rdf'),
                "desc" => __("Mention the URL of your RSS here.",'rdf'),
                "id" => "roadfighter_rss",
                "std" => "#",
                "type" => "text"),
            array("name" => __("Google+ URL",'rdf'),
                "desc" => __("Mention the URL of your Google+ here.",'rdf'),
                "id" => "roadfighter_google",
                "std" => "#",
                "type" => "text"),
            array("name" => __("Pinterest URL",'rdf'),
                "desc" => __("Mention the URL of your Pinterest here.",'rdf'),
                "id" => "roadfighter_pinterest",
                "std" => "#",
                "type" => "text"),
            array("name" => __("YouTube URL",'rdf'),
                "desc" => __("Mention the URL of your YouTube here.",'rdf'),
                "id" => "roadfighter_youtube",
                "std" => "#",
                "type" => "text"),
            array("name" => __("Stumbleupon URL",'rdf'),
                "desc" => __("Mention the URL of your Stumbleupon here.",'rdf'),
                "id" => "roadfighter_sd",
                "std" => "#",
                "type" => "text"));

        roadfighter_update_option('of_template', $options);
        roadfighter_update_option('of_themename', $themename);
        roadfighter_update_option('of_shortname', $shortname);
    }

}
?>
