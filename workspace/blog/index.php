<?php

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";

class App
{
    protected $method = NULL;
    protected $path = NULL;
    protected $parts = NULL;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = $_GET['PATH_INFO'];
        $this->parts = preg_split("$/$", $this->path);
    }

    public function process()
    {
        switch ($this->method) {
            case "POST":    # create new post
                $this->post();
                break;
            case "PUT":     # update post
                $this->put();
                break;
            case "DELETE":  # delete post
                $this->delete();
                break;
            case "GET":     # request resource
                $this->get();
                break;
            default:
                http_response_code(301);
                header("Location: index.php");
                break;
        }
    }

    protected function get()
    {
        $parts = $this->parts;
//        echo "<pre>";
//        print_r($parts);
//        echo "</pre>";
        if (empty($parts)
            || (count($parts) == 1 && empty($parts[0]))
            || (count($parts) == 1 && $parts[0] == 'posts')
        ) {
            include_once "index.html";
        } else if (count($parts) == 2 && $parts[0] == 'posts') {
            $post_no = $parts[1];
            if(is_numeric($post_no)) {
                # get post from mysql
                include_once "post.html";
            } else if($parts[1] == 'create') {
                # get page for creation post
                include_once "create.html";
            }
        }
    }

    protected function post()
    {
        $parts = $this->parts;
        if (count($parts) == 2 && $parts[0] == 'posts') {
            if($parts[1] == 'create') {
                $body = file_get_contents("php://input");
                $post = json_decode($body);
                // Save post to database
                $post->id = rand(1, 100);
                header("Content-Type: application/json");
                echo json_encode($post);
            }
        }
    }
}

$app = new App;

$app->process();