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
        $this->parts = preg_split("$/$", $this->path, -1, PREG_SPLIT_NO_EMPTY);
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

        if (empty($parts)
            || (count($parts) == 1 && empty($parts[0]))
            || (count($parts) == 1 && $parts[0] == 'posts')
        ) {
            include_once "template/index.php";
        } else if (count($parts) == 2 && $parts[0] == 'posts') {
            $post_no = $parts[1];
            if(is_numeric($post_no)) {
                # get post from mysql
                $this->post = [
                    'id' => 1,
                    'title' => 'Hello World',
                    'content' => 'It is my first post',
                    'author'  => 'Max',
                    'published_date'  => date("d/m/Y H:i:s")
                ];
                include_once "template/post.php";
            } else if($parts[1] == 'create') {
                # get page for creation post
                include_once "template/create.php";
            } else if($parts[1] == 'edit') { //blog/posts/edit/1

            }
        }
    }

    protected function post() // /blog/posts/create
    {
        $parts = $this->parts;
        if (count($parts) == 2 && $parts[0] == 'posts') {
            if($parts[1] == 'create') {
                $body = file_get_contents("php://input");
                $post = json_decode($body);
                // Save post to database
                if(preg_match("/^data:(.*?);base64,(.*)$/", $post->image, $match)) {
                    $img_type = $match[1];
                    $img_data = $match[2];
                    $image = base64_decode($img_data);
                    $f = fopen("uploaded/".$post->image_name, "wb");
                    fwrite($f, $image);
                    fclose($f);
                    //file_put_contents(, $image);
                }
                $post->id = rand(1, 100);
                $post->status = "Success";
                header("Content-Type: application/json");
                echo json_encode($post);
            }
        }
    }

    protected function put() // /blog/posts/1
    {
        header("Content-Type: application/json");
        echo json_encode(["return"=>"Ok"]);
    }
}

$app = new App;

$app->process();