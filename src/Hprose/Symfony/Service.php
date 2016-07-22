<?php
/**********************************************************\
|                                                          |
|                          hprose                          |
|                                                          |
| Official WebSite: http://www.hprose.com/                 |
|                   http://www.hprose.org/                 |
|                                                          |
\**********************************************************/

/**********************************************************\
 *                                                        *
 * Hprose/Symfony/Service.php                             *
 *                                                        *
 * hprose symfony http service class for php 5.3+         *
 *                                                        *
 * LastModified: Jul 22, 2016                             *
 * Author: Ma Bingyao <andot@hprose.com>                  *
 *                                                        *
\**********************************************************/

namespace Hprose\Symfony;

class Service extends \Hprose\Http\Service {
    public function header($name, $value, $context) {
        $context->response->headers->set($name, $value);
    }
    public function getAttribute($name, $context) {
        return $context->request->server->get($name);
    }
    public function hasAttribute($name, $context) {
        return $context->request->server->has($name);
    }
    protected function readRequest($context) {
        return $context->request->getContent();
    }
    protected function createContext($request, $response) {
        $context = parent::createContext();
        $context->request = $request;
        $context->response = $response;
        $context->session = $request->getSession();
        return $context;
    }
    public function writeResponse($data, $context) {
        echo $context->response->setContent($data);
    }
    public function isGet($context) {
        return $context->request->isMethod('GET');
    }
    public function isPost($context) {
        return $context->request->isMethod('POST');
    }
}
