<?php

namespace App\Services;

use App\Visitor;
use Illuminate\Support\Facades\Hash;

class VisitorService extends BaseService
{
    protected $_model;

    protected $_data = [];

    protected $_errors = [];

    public function __construct(Visitor $model, array $data = [])
    {
        $this->_model = $model;
        $this->_data = $data;
    }

    public function store()
    {
        $this->_model->fill($this->_data);

        $password = data_get($this->_data, 'password');

        if($password)
            $this->updatePassword($password);

        try {
            $this->_model->save();

            return true;
        } catch(\Exception $e) {
            $this->_errors[] = $e->getMessage();

            $this->log($e->getMessage());

            return false;
        }
    }
    
    public function updatePassword(string $password = null)
    {
        if(!$password)
            return true;

        $hashed = Hash::make($password);

        $this->_model->fill([
            'password' => $hashed
        ]);

        $this->_model->save();
    }

    public function model()
    {
        return $this->_model;
    }

    public function data()
    {
        return $this->_data;
    }

    public function errors()
    {
        return $this->_errors;
    }
}