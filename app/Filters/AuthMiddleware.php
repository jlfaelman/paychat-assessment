<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthMiddleware implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('auth');
        if (!isLoggedIn()) {
            return redirect()->to('/auth');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
