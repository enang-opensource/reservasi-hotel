<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (session()->get('roles')==null) {
      session()->setFlashdata('error', 'silakan lakukan login terlebih dahulu!');
      return redirect()->to('admin');
    } elseif(session()->get('roles') == '1') {
      return redirect()->to('users');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
