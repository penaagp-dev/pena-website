<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Borrow\BorrowRequest;
use App\Repositories\BorrowRepositories;

class BorrowController extends Controller
{
    protected $borrowRepositories;
    public function __construct(BorrowRepositories $borrowInterface)
    {
        $this->borrowRepositories = $borrowInterface;
    }
    public function getAllData(){
        return $this->borrowRepositories->getAllData();
    }
    public function CreateData(BorrowRequest $request){
        return $this->borrowRepositories->CreateData($request);
    }
    public function getDataById($id){
        return $this->borrowRepositories->getDataById($id);
    }
    public function updateData(BorrowRequest $request, $id){
        return $this->borrowRepositories->updateData($request, $id);
    }
    public function deleteData($id){
        return $this->borrowRepositories->deleteData($id);
    }
}
