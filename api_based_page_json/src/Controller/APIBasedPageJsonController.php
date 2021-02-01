<?php

namespace Drupal\api_based_page_json\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Returns node data as JSON based on API key.
 */
class APIBasedPageJsonController extends ControllerBase {

  /**
   * Returns node data as JSON.
   */
  public function getNodeJSON($site_api, $nid) {
    // Configured site api key.
    $site_api_key = \Drupal::config('system.site')->get('siteapikey');
    $node = Node::load($nid);
    // Validate if the node is of page content type and site api key.
    if ($node && $site_api_key == $site_api && $node->getType() == 'page') {
      $node_json = \Drupal::service('serializer')->serialize($node, 'json');
      $status = 200;
    }
    else {
      $node_json = 'Access Denied';
      $status = 403;
    }
    // Return result.
    return new JsonResponse([ 'data' => $node_json, 'status'=> $status]);
  }
  
}
