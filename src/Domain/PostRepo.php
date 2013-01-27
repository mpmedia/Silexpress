<?php
namespace Domain;

class PostRepo {
  private $baseUrl;

  public function __construct($baseUrl) {
    $this->baseUrl = $baseUrl;
  }

  public function firstPage() {
    $json = json_decode(file_get_contents("{$this->baseUrl}/?json=1&post_type=post"));
    // TODO Implement safety measures
    return $this->hydrateMany($json);
  }

  public function oneWithSlug($slug) {
    $json = json_decode(file_get_contents("{$this->baseUrl}/?json=get_post&slug={$slug}"));
    // TODO Implement safety measures. Maybe return NullPost if something goes wrong
    return $this->hydrateOne($json);
  }

  private function hydrateOne($json) {
    $post = new Post();
    if (null !== $json)
      $post->hydrate($json->post);
    return $post;
  }

  private function hydrateMany($json) {
    $posts = array();
    foreach ($json->posts as $jsonPost) {
      $post    = new Post();
      $posts[] = $post->hydrate($jsonPost);
    }
    return $posts;
  }
}