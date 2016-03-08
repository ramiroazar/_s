<?php

function _s_schema_configuration() {

  // JSON-LD for Wordpress Home Articles and Author Pages written by Pete Wailes and Richard Baxter
  function get_post_data() {
    global $post;
    return $post;
  }

  // stuff for any page
  $payload["@context"] = "http://schema.org/";

  // this has all the data of the post/page etc
  $post_data = get_post_data();

  // stuff for any page, if it exists
  $category = get_the_category();

  $payload["@type"] = 'WebPage';

  // Is search results page
  if ( is_search() ) :
    $payload["@type"] = 'SearchResultsPage';
  endif;

  // Is contact page
  if ( get_theme_mod('page_contact') && is_page( get_theme_mod('page_contact') ) ) :
    $payload["@type"] = 'ContactPage';
  endif;

  // Is about page
  if ( get_theme_mod('page_about') && is_page( get_theme_mod('page_about') ) ) :
    $payload["@type"] = 'AboutPage';
  endif;

  // Is FAQs page
  if ( get_theme_mod('page_faqs') && is_page( get_theme_mod('page_faqs') ) ) :
    $payload["@type"] = 'QAPage';
  endif;

  // Is gallery page
  if ( get_theme_mod('page_gallery') && is_page( get_theme_mod('page_gallery') ) ) :
    $payload["@type"] = 'ImageGallery';
  endif;

  // Is single product page
  if ( function_exists('is_product') && is_product() ) :
    $payload["@type"] = 'ItemPage';
  endif;

  // Is checkout page
  if ( function_exists('is_checkout') && is_checkout() ) :
    $payload["@type"] = 'CheckoutPage';
  endif;

  // stuff for specific pages
  if (is_single()) :

    // this gets the data for the user who wrote that particular item
    $author_data = get_userdata($post_data->post_author);
    $post_url = get_permalink();
    $post_thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

    $payload["@type"] = "Article";
    $payload["url"] = $post_url;
    $payload["author"] = array(
        "@type" => "Person",
        "name" => $author_data->display_name,
        );
    $payload["headline"] = $post_data->post_title;
    $payload["datePublished"] = $post_data->post_date;
    if ($post_thumb) { $payload["image"] = $post_thumb; }
    $payload["ArticleSection"] = $category[0]->cat_name;
    $payload["Publisher"] = get_bloginfo('name');

  endif;

  // we do all this separately so we keep the right things for organization together

  if (is_front_page()) :

    $payload["@type"] = "Organization";
    $payload["name"] = get_bloginfo('name');
    // $payload["logo"] = "";
    $payload["url"] = esc_url( home_url( '/' ) );

    $payload["sameAs"] = array();
    if (get_theme_mod('facebook')) { array_push($payload["sameAs"], get_theme_mod('facebook')); }
    if (get_theme_mod('googleplus')) { array_push($payload["sameAs"], get_theme_mod('googleplus')); }
    if (get_theme_mod('twitter')) { array_push($payload["sameAs"], get_theme_mod('twitter')); }
    if (get_theme_mod('instagram')) { array_push($payload["sameAs"], get_theme_mod('instagram')); }
    if (get_theme_mod('pinterest')) { array_push($payload["sameAs"], get_theme_mod('pinterest')); }
    if (get_theme_mod('youtube')) { array_push($payload["sameAs"], get_theme_mod('youtube')); }
    if (get_theme_mod('linkedin')) { array_push($payload["sameAs"], get_theme_mod('linkedin'));}

    $payload["contactPoint"] = array();

    $contactPointData = array(
      "@type" => "ContactPoint",
      "contactType" => "customer service"
    );

    $contactPointData["telephone"] = array();

    if (get_theme_mod('phone')) { array_push($contactPointData["telephone"], get_theme_mod('phone')); }
    if (get_theme_mod('mobile')) { array_push($contactPointData["telephone"], get_theme_mod('mobile')); }
    if (get_theme_mod('fax')) { array_push($contactPointData["telephone"], get_theme_mod('fax')); }
    if (get_theme_mod('email')) { $contactPointData["email"] = get_theme_mod('email'); }
    if (get_theme_mod('address')) { $contactPointData["address"] = get_theme_mod('address'); }

    array_push($payload["contactPoint"], $contactPointData);

  endif;

  if (is_author()) :

    // this gets the data for the user who wrote that particular item
    $author_data = get_userdata($post_data->post_author);

    $payload["@type"] = "Person";
    $payload["name"] = $author_data->display_name;
    $payload["email"] = $author_data->user_email;

  endif;

  return $payload;

}

function _s_schema() {
  echo '<script type="application/ld+json">' . json_encode(_s_schema_configuration()) . '</script>';
}

add_action( 'wp_head', '_s_schema' );
