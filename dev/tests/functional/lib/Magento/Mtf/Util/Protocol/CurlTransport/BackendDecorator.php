<?php
/**
<<<<<<< HEAD
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Tests
 * @package     Tests_Functional
 * @copyright  Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
=======
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
 */

namespace Magento\Mtf\Util\Protocol\CurlTransport;

<<<<<<< HEAD
use Magento\Mtf\Util\Protocol\CurlTransport;
use Magento\Mtf\Util\Protocol\CurlInterface;
use Magento\Mtf\Config\DataInterface;

/**
 * Backend decorator.
=======
use Magento\Mtf\Config\DataInterface;
use Magento\Mtf\Util\Protocol\CurlInterface;
use Magento\Mtf\Util\Protocol\CurlTransport;

/**
 * Curl transport on backend.
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
 */
class BackendDecorator implements CurlInterface
{
    /**
<<<<<<< HEAD
     * @var \Magento\Mtf\Util\Protocol\CurlTransport
     */
    protected $_transport;

    /**
     * @var DataInterface
     */
    protected $_configuration;

    /**
     * @var string
     */
    protected $_formKey = null;

    /**
     * @var string
     */
    protected $_response;
=======
     * Curl transport protocol.
     *
     * @var CurlTransport
     */
    protected $transport;

    /**
     * Form key.
     *
     * @var string
     */
    protected $formKey = null;

    /**
     * Response data.
     *
     * @var string
     */
    protected $response;

    /**
     * System config.
     *
     * @var DataInterface
     */
    protected $configuration;
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32

    /**
     * @constructor
     * @param CurlTransport $transport
     * @param DataInterface $configuration
     */
    public function __construct(CurlTransport $transport, DataInterface $configuration)
    {
<<<<<<< HEAD
        $this->_transport = $transport;
        $this->_configuration = $configuration;
        $this->_transport->write(CurlInterface::GET, $_ENV['app_backend_url'], '1.0');
        $this->read();
        $this->_authorize();
=======
        $this->transport = $transport;
        $this->configuration = $configuration;
        $this->authorize();
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }

    /**
     * Authorize customer on backend.
     *
     * @throws \Exception
     * @return void
     */
<<<<<<< HEAD
    protected function _authorize()
    {
        $url = $_ENV['app_backend_url'];
        $data = [
            'login[username]' => $this->_configuration->get('application/0/backendLogin/0/value'),
            'login[password]' => $this->_configuration->get('application/0/backendPassword/0/value'),
            'form_key' => $this->_formKey,
        ];
        $this->_transport->write(CurlInterface::POST, $url, '1.0', [], $data);
        $response = $this->read();
        if (!strpos($response, 'link-logout')) {
            throw new \Exception("Admin user cannot be logged in by curl handler!\n Post url: $url");
=======
    protected function authorize()
    {
        // Perform GET to backend url so form_key is set
        $url = $_ENV['app_backend_url'];
        $this->transport->write($url, [], CurlInterface::GET);
        $this->read();

        $url = $_ENV['app_backend_url'] . $this->configuration->get('application/0/backendLoginUrl/0/value');
        $data = [
            'login[username]' => $this->configuration->get('application/0/backendLogin/0/value'),
            'login[password]' => $this->configuration->get('application/0/backendPassword/0/value'),
            'form_key' => $this->formKey,
        ];
        $this->transport->write($url, $data, CurlInterface::POST);
        $response = $this->read();
        if (strpos($response, 'page-login')) {
            throw new \Exception(
                'Admin user cannot be logged in by curl handler!'
            );
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
        }
    }

    /**
     * Init Form Key from response.
     *
     * @return void
     */
<<<<<<< HEAD
    protected function _initFormKey()
    {
        preg_match('!var FORM_KEY = \'(\w+)\';!', $this->_response, $matches);

        if (!empty($matches[1])) {
            $this->_formKey = $matches[1];
        } else {
            preg_match('!input name="form_key" type="hidden" value="(\w+)"!', $this->_response, $matches);
            if (!empty($matches[1])) {
                $this->_formKey = $matches[1];
            }
=======
    protected function initFormKey()
    {
        preg_match('!var FORM_KEY = \'(\w+)\';!', $this->response, $matches);
        if (!empty($matches[1])) {
            $this->formKey = $matches[1];
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
        }
    }

    /**
<<<<<<< HEAD
     * Send request to the remote server
     *
     * @param string $method
     * @param string $url
     * @param string $http_ver
     * @param array $headers
     * @param array $params
     * @return void
     *
     * @throws \Exception
     */
    public function write($method, $url, $http_ver = '1.1', $headers = [], $params = [])
    {
        if ($this->_formKey) {
            $params['form_key'] = $this->_formKey;
            isset($params['data'])
                ? $params['data'] = preg_replace('!formKey!', $this->_formKey, $params['data'])
                : null;
        } else {
            throw new \Exception('Form key is absent! Response: \n'
                . "Url:" . $url
                . "Response:" . $this->_response);
        }
        $this->_transport->write($method, $url, $http_ver, $headers, http_build_query($params));
=======
     * Send request to the remote server.
     *
     * @param string $url
     * @param mixed $params
     * @param string $method
     * @param mixed $headers
     * @return void
     * @throws \Exception
     */
    public function write($url, $params = [], $method = CurlInterface::POST, $headers = [])
    {
        if ($this->formKey) {
            $params['form_key'] = $this->formKey;
        } else {
            throw new \Exception(sprintf('Form key is absent! Url: "%s" Response: "%s"', $url, $this->response));
        }
        $this->transport->write($url, http_build_query($params), $method, $headers);
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }

    /**
     * Read response from server.
     *
     * @return string
     */
    public function read()
    {
<<<<<<< HEAD
        $this->_response = $this->_transport->read();
        $this->_initFormKey();
        return $this->_response;
=======
        $this->response = $this->transport->read();
        $this->initFormKey();
        return $this->response;
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }

    /**
     * Add additional option to cURL.
     *
<<<<<<< HEAD
     * @param  int $option
     * @param  mixed $value
=======
     * @param int $option the CURLOPT_* constants
     * @param mixed $value
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     * @return void
     */
    public function addOption($option, $value)
    {
<<<<<<< HEAD
        $this->_transport->addOption($option, $value);
=======
        $this->transport->addOption($option, $value);
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }

    /**
     * Close the connection to the server.
     *
     * @return void
     */
    public function close()
    {
<<<<<<< HEAD
        $this->_transport->close();
=======
        $this->transport->close();
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }
}
