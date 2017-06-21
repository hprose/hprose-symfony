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
 * LastModified: Jun 21, 2017                             *
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
    public function writeResponse($data, $context) {
        $context->response->setContent($data);
    }
    public function isGet($context) {
        return $context->request->isMethod('GET');
    }
    public function isPost($context) {
        return $context->request->isMethod('POST');
    }
}
