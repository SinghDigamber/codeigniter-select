<?php namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;


class AutocompleteSearch extends Controller
{

    public function index() {
        return view('home');
    }
    
    public function ajaxSearch()
    {
        helper(['form', 'url']);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('users');   

        $query = $builder->like('name', $this->request->getVar('q'))
                    ->select('id, name as text')
                    ->limit(10)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }

}