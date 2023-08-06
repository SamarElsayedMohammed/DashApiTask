<?php
namespace App\Interfaces;

interface PostInterface
{
    public function getAll($withPagination = false, $perPage = 20);
    public function getById($id);
    public function create($data);
    public function update($data, $id);
    public function delete($id);

}
