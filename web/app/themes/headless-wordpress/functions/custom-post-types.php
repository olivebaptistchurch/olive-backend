<?php
  add_action( "init", "create_custom_post_type" );

  function create_custom_post_type() {
    register_post_type("funeral_videos", // Register Funeral Video Type
      array(
        "labels" => array(
          "name"                => "Funeral Videos",
          "singular_name"       => "Funeral Video",
          "add_new"             => "Add New",
          "add_new_item"        => "Add New Funeral Video",
          "edit"                => "Edit",
          "edit_item"           => "Edit Funeral Video",
          "new_item"            => "New Funeral Video",
          "view"                => "View Funeral Video",
          "view_item"           => "View Funeral Video",
          "search_items"        => "Search Funeral Videos",
          "not_found"           => "No Funeral Videos found",
          "not_found_in_trash"  => "No Funeral Videos found in Trash"
        ),
        "menu_position"         => 5,
        "menu_icon"             => "dashicons-format-video",
        "public"                => true,
        "show_in_rest"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "publicly_queryable"    => true,
        "capability_type"       => "page",
        "hierarchical"          => false,
        "has_archive"           => true,
        "supports"              => array("title","thumbnail","editor","revisions","excerpt","author"), // Other Options: trackbacks, custom-fields, page-attributes, comments, post-formats
        "can_export"            => true, // Allows export in Tools > Export
        "taxonomies"            => array(), // Add supported taxonomies,
        "show_in_graphql"       => true,
        "graphql_single_name"   => "funeralVideo",
        "graphql_plural_name"   => "funeralVideos",
      )
    );
  }
?>