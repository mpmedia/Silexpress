<?php
namespace Domain;

class Post {
  public $id;
  public $author;
  public $date;
  public $slug;
  public $title;
  public $content;
  public $excerpt;

  public function hydrate($json) {
    $this->id      = $json->id;
    $this->author  = $json->author->name;
    $this->date    = $json->date;
    $this->slug    = $json->slug;
    $this->title   = $json->title;
    $this->content = $json->content;
    $this->excerpt = $json->excerpt;
    return $this;
  }
}