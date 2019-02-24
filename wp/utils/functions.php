<?php

function getPostsOnConditionACF() {
  $args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'meta_key' => 'is_rendered_on_homepage',
    'mata_value' => 'true'
  ];
  $loop = new WP_Query($args);

  $posts = [];
  while ($loop->have_posts()) {
    $loop->the_post();

    $post = new HomepagePost();
    $this->populateHomepagePost($post);

    $posts[] = $post;
  }

  return $posts;
}

