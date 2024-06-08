<?php

namespace App\Http\Repositories;

interface IBaseRepository
{
    public function index($filters = null);
    public function show($request);
    public function store($request);
    public function update($model, $request);
    public function destroy($model);
}