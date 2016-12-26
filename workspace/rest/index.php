<?php

class Post
{

}

class RestService
{
    private $method;
    private $request = array();
    function __construct()
    {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        if(isset($_GET['PATH_INFO'])) {
            $this->request = explode("/", $_GET['PATH_INFO']);
        }
    }

    function response()
    {
        return $this->{$this->method}();
    }

    protected function get()
    {
        if(is_array($this->request)){
            if(count($this->request) == 2) {
                $resource = array_shift($this->request);
                $id = array_shift($this->request);
                if($resource == "student") {
                    $student = [
                        'id' => $id,
                        'position' => [
                            'title' => 'PHP Developer',
                        ],
                    ];
                    $json = json_encode($student);
                    http_response_code(200);
                    header("Content-Type: application/json");
                    return $json;
                }
            }
        }
    }

    protected function post()
    {
        $body = file_get_contents("php://input");
        switch (strtolower($_SERVER['HTTP_CONTENT_TYPE'])) {
            case "application/json":
                $data = json_decode($body);
                break;
        }
    }

    protected function put()
    {

    }
    protected function delete()
    {

    }
}

$rest = new RestService();
print $rest->response();