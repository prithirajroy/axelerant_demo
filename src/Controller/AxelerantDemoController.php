<?php

/**
@file
Contains \Drupal\first_module\Controller\FirstController.
*/
namespace Drupal\axelerant_demo\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\State\State;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
 
class AxelerantDemoController extends ControllerBase {

    /**
     * The state store.
    *
    * @var Drupal\Core\State\State
    */

    protected $state;
    
    /**
      * Constructor method.
      *
      * @param Drupal\Core\State\State $state
      *   The object State.
    */
     public function __construct(State $state) {
        $this->state = $state;
     }

    /**
    * {@inheritdoc}
    */
    public static function create(ContainerInterface $container) {
        // Instantiates this form class.
        return new static(
            // Load the service required to construct this class.
            $container->get('state')
        );
    }

    /**
    * {@inheritdoc}
    */
    public function returnJSON($api_key, $nid) {
        if(!empty($api_key) && !empty($nid)){
            if($this->state->get('siteapikey') == $api_key){
                $node_details = Node::load($nid);
                if($node_details->getType() == 'page'){
                    $result[] = [
                        "id" => $node_details->id(),
                        "title" => $node_details->getTitle(),
                        "type" => $node_details->getType(),
                        "success" => true,
                    ];
                    $response['result'] = $result;
                    $response['status'] = 'Data found.';
                    $response['success'] = true;
                }else{
                    $response['result'] = 'Sorry! node id is not present in database.';
                    $response['status'] = 'access denied';
                    $response['success'] = false;
                }
                
            }else{
                $response['result'] = 'Sorry! api key is incorrect.';
                $response['status'] = 'access denied';
                $response['success'] = false;
            }
        }else{
            $response['result'] = 'Please check the parameters either site api key or node id is missing';
            $response['status'] = 'access denied';
            $response['success'] = false;
        }
        return new JsonResponse([ 'data' => $response['result'], 'method' => 'GET', 'status' => $response['status'], 'success' => $response['success']]);
    }
}