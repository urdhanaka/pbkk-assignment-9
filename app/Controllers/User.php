<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        $data = [
            "title" => "User",
            "user" => $this->userModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('user/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail User',
            'user' => $this->userModel->getUserByRoleAndId('user', $id)
        ];
        return view('user/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'validation' => \Config\Services::validation()
        ];
        return view('user/create', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
            'username' => [
            'rules' => 'required|is_unique[user.username]',
            'errors' => [
            'required' => '{field} harus diisi.',
            'is_unique' => '{field} sudah terdaftar.'
            ]
            ],
            'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
            'required' => '{field} harus diisi.',
            'min_length' => '{field} minimal 8 karakter.'
            ]
            ],
            'nama' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} harus diisi.'
            ]
            ],
            'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
            'required' => '{field} harus diisi.',
            'valid_email' => '{field} tidak valid.',
            'is_unique' => '{field} sudah terdaftar.'
            ]
            ],
            'no_hp' => [
            'rules' => 'required|numeric',
            'errors' => [
            'required' => '{field} harus diisi.',
            'numeric' => '{field} harus berupa angka.',
            'is_unique' => '{field} sudah terdaftar.'
            ]
            ],
            'alamat' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} harus diisi.'
            ]
            ]
            ]
        )
        ) {
            return redirect()->to('/user/create')->withInput();
        }
        $this->userModel->save(
            [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'role' => 'user'
            ]
        );
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getUserByRoleAndId('user', $id)
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $userLama = $this->userModel->getUserByRoleAndId('user', $id);
        if ($userLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[user.username]';
        }
        if ($userLama['email'] == $this->request->getVar('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|valid_email|is_unique[user.email]';
        }
        if ($userLama['no_hp'] == $this->request->getVar('no_hp')) {
            $rule_no_hp = 'required';
        } else {
            $rule_no_hp = 'required|numeric|is_unique[user.no_hp]';
        }
        if (!$this->validate(
            [
            'username' => [
            'rules' => $rule_username,
            'errors' => [
            'required' => '{field} harus diisi.',
            'is_unique' => '{field} sudah terdaftar.'
            ]
            ],
            'nama' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} harus diisi.'
            ]
            ],
            'email' => [
            'rules' => $rule_email,
            'errors' => [
            'required' => '{field} harus diisi.',
            'valid_email' => '{field} tidak valid.',
            'is_unique' => '{field} sudah terdaftar.'
            ]
            ],
            'no_hp' => [
            'rules' => $rule_no_hp,
            'errors' => [
            'required' => '{field} harus diisi.',
            'numeric' => '{field} harus berupa angka.',
            'is_unique' => '{field} sudah terdaftar.'
            ]
            ],
            'alamat' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} harus diisi.'
            ]
            ]
            ]
        )
        ) {
            dd($this->validator->listErrors());
            return redirect()->to('/user/edit/' . $id)->withInput();
        }
        $this->userModel->save(
            [
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'role' => 'user'
            ]
        );
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/user');
    }
}

