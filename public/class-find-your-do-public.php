<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 */
class Find_Your_Do_Public 
{

	private $plugin_name;
	private $version;
    private $results_post_id;

	public function __construct( $plugin_name, $version, $results_post_id ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->results_post_id = $results_post_id;

	}

    /**
     * Remove the title from the results page.
     *
     */
    public function filter_the_title($title)
    {
        global $post;

        if ($post->ID == $this->results_post_id) {
            $title = '';
        }

        return $title;
    }

	public function enqueue_styles() 
    {
		wp_enqueue_style( 
            $this->plugin_name, 
            plugin_dir_url( __FILE__ ) . 'css/find-your-do-public.css', 
            array(), 
            $this->version, 
            'all'
        );
	}

	public function enqueue_scripts() 
    {
		wp_enqueue_script( 
            $this->plugin_name, 
            plugin_dir_url( __FILE__ ) . 'js/find-your-do-public.js', 
            array( 'jquery' ), 
            $this->version, 
            false 
        );
	}

}
