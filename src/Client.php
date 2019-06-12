<?php 
namespace CloudStinger\ImageCdnClient;

use GuzzleHttp\Client as HttpClient;

/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author yourname
*/
class Client{

    /**  @var string $m_SampleProperty define here what this variable is for, do this for every instance variable */
    private $http;

    public $public_key;

    public $secret_key;

    public function __construct(string $public_key, string $secret_key, $hostname = 'https://imagecdn.forthe.top') {
        $this->public_key = $public_key;
        $this->secret_key = $secret_key;
        $this->http = new HttpClient([
          'base_uri' => $hostname . '/api/v1',
        ]);
    }

    /**
    * Sample method 
    *
    * Always create a corresponding docblock for each method, describing what it is for,
    * this helps the phpdocumentator to properly generator the documentation
    *
    * @param string $param1 A string containing the parameter, do this for each parameter to the function, make sure to make it descriptive
    *
    * @return string
    */
    public function addImage($image_file_content) {
    	$response = $http->post('images/' . $id, [
            'query' => compact($this->public_key, $this->secret_key),
            'multipart' => [
                'name' => 'image',
                'contents' => $image_file_content,

            ]
        ]);
        return $response->getBody();
    }

    public function removeImage($id) {
        $response = $http->delete('images/' . $id, [
        'query' => compact($this->public_key, $this->secret_key),
        ]);
        return ($response->getStatusCode() === '200');
    }

    public function getImage($id) {
        $response = $http->get('images/' . $id, [
            'query' => compact($this->public_key, $this->secret_key),
        ]);
        return $response->getBody();
    }
}