<?php
namespace Fkra\EgyptExpress\Controller\Index;
ini_set('display_errors','1');
class test extends \Magento\Framework\App\Action\Action
{

    protected $_customLogger;

    public function __construct(
        \Magento\Framework\App\Action\Context $context
       
    ){
       
        return parent::__construct($context);
    }

    public function execute()
    {
       

    $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $result = file_get_contents("http://api.egyptexpress.me/api/shippingCities", false, stream_context_create($arrContextOptions));


      //  $url = "http://82.129.197.84:8080/api/shippingCities";
      //  $result = file_get_contents($url);
        $cities = json_decode($result, true);
        $cityList = $cities['cities'];
        $citiesArray = array();
        foreach($cityList as $city){
            $code = $city['code'];
            $name = $city['city_en'];
            $cityArray = array(
                'value' => $code,
                'label' => $name
            );
            array_push($citiesArray,$cityArray);
        }

        //echo '<pre>';print_r($citiesArray);die;

       // return $citiesArray;
        print_r($citiesArray);
        
    }

    
}