<?php

namespace App\Libraries;

use Auth0\SDK\Auth0;

class Auth
{
  /**
   * An array of helpers to be loaded automatically upon
   * class instantiation. These helpers will be available
   * to all other controllers that extend BaseController.
   *
   * @var array
   */
  protected $helpers = [];
  /**
   * Constructor.
   */
  public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
  {
    // Do Not Edit This Line
    parent::initController($request, $response, $logger);
    //--------------------------------------------------------------------
    // Preload any models, libraries, etc, here.
    //--------------------------------------------------------------------
    // E.g.:
    $this->session = \Config\Services::session();
    $this->request = \Config\Services::request();
    $this->db = \Config\Database::connect();
    $this->client = \Config\Services::curlrequest();
    $this->ip_address = (string) $this->request->getIPAddress();
  }

  public function initialize()
  {
    $this->auth = new Auth0([
      'domain' => 'clrp.auth0.com',
      'client_id' => 'qi61es7GDhtZ1iIUvog0VnvpphKTHxsz',
      'client_secret' => 'zRnR1cN2vrfqxtSxBNCyIeRANQvnVm7yd2rKkpYdoyDcbMLQWeSO5NiHULBK4A9R',
      'redirect_uri' => 'https://test.clrp.city/secure/callback',
      'persist_id_token' => true,
      'persist_access_token' => true,
      'persist_refresh_token' => true,
    ]);

    return $this->auth;
  }
}
