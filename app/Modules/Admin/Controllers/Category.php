<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_category;

class Category extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_category = new M_category;
  }

  #menu index
  public function index()
  {
    $data = [
      'title'     => 'Category',
      'menu'      => 'category',
      'category'  => $this->m_category->getData(),
    ];

    echo view('\App\Modules\Admin\Views\content\v_category', $data);
  }

  #process insert
  public function insert()
  {

    #validation
    if (!$this->validate([
      'j_kategori' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis Kategori harus diisi!',
        ]
      ],
      ])) {
        session()->setFlashdata('error', 'Error, jenis kategori harus diisi!');
        return redirect()->back();
      }

      #get input data
      $jenis_kategori = $this->request->getVar('j_kategori');

      if ($this->m_category->insert_data($jenis_kategori)) {
        session()->setFlashdata('msg', 'Success, berhasil menambah data!');
        return redirect()->to('admin/category');
      } else {
        session()->setFlashdata('error', 'Error, gagal menambah data!');
        return redirect()->back();
      }
    }

    #process delete
    public function delete($id_kategori)
    {
      if ($this->m_category->delete_data($id_kategori)) {
        session()->setFlashdata('msg', 'Success, berhasil menghapus data!');
        return redirect()->to('admin/category');
      } else {
        session()->setFlashdata('error', 'Error, gagal menghapus data!');
        return redirect()->back();
      }
    }

    #menu update
    public function update_menu($id_kategori)
    {
      $data = [
        'title'       => 'Category',
        'menu'        => 'category',
        'category'    => $this->m_category->getData(),
        'category_id' => $this->m_category->fillter($id_kategori),
      ];

      echo view('\App\Modules\Admin\Views\content\v_category', $data);
    }

    #process update
    public function update()
    {
      #validation
      if (!$this->validate([
        'j_kategori' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Jenis Kategori harus diisi!',
          ]
        ],
        ])) {
          session()->setFlashdata('error', 'Error, jenis kategori harus diisi!');
          return redirect()->back();
        }

        #get input data
        $id_kategori = $this->request->getVar('id');
        $jenis_kategori = $this->request->getVar('j_kategori');

      if ($this->m_category->update_data($id_kategori, $jenis_kategori)) {
        session()->setFlashdata('msg', 'Success, berhasil mengubah data!');
        return redirect()->to('admin/category');
      } else {
        session()->setFlashdata('error', 'Error, gagal mengubah data!');
        return redirect()->back();
      }
    }
  }
