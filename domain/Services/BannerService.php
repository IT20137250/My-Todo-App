<?php

namespace domain\Services;

use App\Models\Banner;
use infrastructure\Facades\ImagesFacade;

class BannerService {

    protected $post;

    public function __construct() {
        $this->post = new Banner();
    }

    public function all() {
        return $this->post->all();
    }

    public function allActive() {
        return $this->post->allActive();
    }

    public function store($data) {
        if (isset($data['images'])) {
            $image = ImagesFacade::store($data['images'], [1,2,3,4,5]);
            $data['image_id'] = $image['created_images']->id;
        }
        $this->post->create($data);
    }

    public function delete($post_id) {
        $post = $this->post->find($post_id);
        $post->delete();
    }

    public function status($post_id) {
        $post = $this->post->find($post_id);
        if ($post->status == 0) {
            $post->status = 1;
            $post->update();
        } else {
            $post->status = 0;
            $post->update();
        }
        
    }

}