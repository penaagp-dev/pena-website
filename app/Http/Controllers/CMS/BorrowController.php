<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Borrow\BorrowRequest;
use App\Repositories\BorrowRepositories;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    protected $BorrowRepositories;
    public function __construct(BorrowRepositories $BorrowInterface)
    {
        $this->BorrowRepositories = $BorrowInterface;
    }
    public function getAllData(){
        return $this->BorrowRepositories->getAllData();
    }
    public function CreateData(BorrowRequest $request){
        return $this->BorrowRepositories->CreateData($request);
    }
    public function getDataById($id){
        return $this->BorrowRepositories->getDataById($id);
    }
    public function updateData(BorrowRequest $request, $id){
        return $this->BorrowRepositories->updateData($request, $id);
    }
    public function deleteData($id){
        return $this->BorrowRepositories->deleteData($id);
    }
}
