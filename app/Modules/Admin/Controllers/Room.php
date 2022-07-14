<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_category;
use App\Modules\Admin\Models\M_room;
use App\Modules\Admin\Models\M_image;
use App\Modules\Admin\Models\M_transaction;

class Room extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_category = new M_category;
    $this->m_room = new M_room;
    $this->m_image = new M_image;
    $this->m_transaction = new M_transaction;
  }

  public function index()
  {
    $data = [
      'title'     => 'Room',
      'menu'      => 'room',
      'category'  => $this->m_category->getData(),
    ];

    echo view('\App\Modules\Admin\Views\content\room\v_room', $data);
  }
  #list kamar
  public function list()
  {
    $data = [
      'title'     => 'Room',
      'menu'      => 'room',
      'room'  => $this->m_room->getData(),
    ];

    echo view('\App\Modules\Admin\Views\content\room\v_list_room', $data);
  }
  #detail Kamar
  public function detail($id_room)
  {
    $data = [
      'title'     => 'List Room',
      'menu'      => 'room',
      'room'  => $this->m_room->fillter($id_room),
      'img'   => $this->m_image->getData($id_room),
    ];

    echo view('\App\Modules\Admin\Views\content\room\v_detail_room', $data);
  }
  #process insert
  public function insert()
  {
    #validation
    if (!$this->validate([
      'n_kamar' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama kamar harus diisi',
        ]
      ],
      'k_kamar' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kapasitas kamar tidak boleh 0',
        ]
      ],
      'h_kamar' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Harga kamar tidak boleh 0',
        ]
      ],
      'd_kamar' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Detail kamar tidak boleh kosong',
        ]
      ],
      ])) {
        session()->setFlashdata('error', 'Error, jenis kategori harus diisi!');
        return redirect()->back();
      }

      #get input data
      $data = [
        'id_kategori' => $this->request->getVar('category_id'),
        'nama_kamar'  => $this->request->getVar('n_kamar'),
        'kapasitas'   => $this->request->getVar('k_kamar'),
        'harga'       => $this->request->getVar('h_kamar'),
        'detail_kamar' => $this->request->getVar('d_kamar'),
      ];

      if ($this->m_room->insert_data($data)) {
        if ($this->request->getFileMultiple('img_kamar')) {
          foreach($this->request->getFileMultiple('img_kamar') as $file)
          {
            #upload to folder
            $file->move(ROOTPATH . 'image');
            #set data
            $image = [
              'id_kamar' => $this->m_room->getInsertID(),
              'path'    => $file->getClientName(),
            ];
            #set to database
            $this->m_image->upload($image);
          }

          session()->setFlashdata('msg', 'Success, berhasil menambah data!');
          return redirect()->to('admin/room');
        }
      } else {
        session()->setFlashdata('error', 'Error, gagal menambah data!');
        return redirect()->back();
      }
    }

    #process delete
    public function delete($id_room)
    {
      $img = $this->m_image->getData($id_room);

      foreach ($img as $value) {
        unlink(ROOTPATH.'public/image/'.$value['path']);
      }

      if ($this->m_room->delete_data($id_room)) {
        session()->setFlashdata('msg', 'Success, berhasil menghapus data!');
        return redirect()->to('admin/room/list');
      } else {
        session()->setFlashdata('error', 'Error, gagal menghapus data!');
        return redirect()->back();
      }
    }

    #process delete
    public function image($id_img, $id_room)
    {
      $img = $this->m_image->fillter($id_img);

      if (unlink(ROOTPATH.'public/image/'.$img->path)) {
        if ($this->m_image->delete_data($id_img)) {
          session()->setFlashdata('msg', 'Success, berhasil menghapus data!');
          return redirect()->back();
        } else {
          session()->setFlashdata('error', 'Error, gagal menghapus data!');
          return redirect()->back();
        }
      }
    }

    #edit menu
    public function edit($id_room)
    {
      $data = [
        'title'     => 'Room',
        'menu'      => 'room',
        'category'  => $this->m_category->getData(),
        'room_id'  =>  $this->m_room->fillter($id_room),
        'img'   => $this->m_image->getData($id_room),
      ];

      echo view('\App\Modules\Admin\Views\content\room\v_room', $data);
    }

    #edit proses
    public function edit_process()
    {
      #validation
      if (!$this->validate([
        'n_kamar' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Nama kamar harus diisi',
          ]
        ],
        'k_kamar' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kapasitas kamar tidak boleh 0',
          ]
        ],
        'h_kamar' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Harga kamar tidak boleh 0',
          ]
        ],
        'd_kamar' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Detail kamar tidak boleh kosong',
          ]
        ],
        ])) {
          session()->setFlashdata('error', 'Error, jenis kategori harus diisi!');
          return redirect()->back();
        }

        #get input data
        $data = [
          'id_kategori' => $this->request->getVar('category_id'),
          'nama_kamar'  => $this->request->getVar('n_kamar'),
          'kapasitas'   => $this->request->getVar('k_kamar'),
          'harga'       => $this->request->getVar('h_kamar'),
          'detail_kamar' => $this->request->getVar('d_kamar'),
          'status'      => 0,
        ];

        #get id room
        $id_room = $this->request->getVar('id');

        #process
        if ($this->m_room->update_data($data, $id_room)) {
          if ($_FILES['img_kamar']['name'][0]!='') {
            foreach($this->request->getFileMultiple('img_kamar') as $file)
            {
              #upload to folder
              $file->move(ROOTPATH . 'public/image');
              #set data
              $image = [
                'id_kamar' => $id_room,
                'path'    => $file->getClientName(),
              ];
              #set to database
              $this->m_image->upload($image);
            }
          }

          session()->setFlashdata('msg', 'Success, berhasil mengubah data!');
          return redirect()->to('admin/room/list');
        } else {
          session()->setFlashdata('error', 'Error, gagal mengubah data!');
          return redirect()->back();
        }
      }

      public function checkin($id_transaksi, $status)
      {
        if ($status=='true') {
          $data_transaksi = [
            'status_checkout' => '1'
          ];
        } else {
          $data_transaksi = [
            'status_checkout' => '2'
          ];
        }

        if ($this->m_transaction->updateTransaksi($id_transaksi, $data_transaksi)) {
          session()->setFlashdata('msg', 'Success, berhasil menghapus data!');
          return redirect()->back();
        } else {
          session()->setFlashdata('error', 'Error, gagal menghapus data!');
          return redirect()->back();
        }

      }
    }
