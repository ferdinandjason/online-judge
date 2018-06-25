<?php

namespace App\Repository\User;

use App\User;
use Carbon\Carbon;
use UserRepository;

class UserEloquent implements UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function update($request, $id)
    {
        $this->model->where('id', $id)->update($request->except('avatar_path', '_method', '_token'));
        if ($request->file('avatar_path') != null) {
            $path = $request->file('avatar_path')
                ->storeAs('user/images', Carbon::now() . $this->model->where('id', $id)->first()['username'] . $request->file('avatar_path')->getClientOriginalName(), 'public');
            $this->model->where('id', $id)->update(Array('avatar_path' => $path));
        }
        return redirect()->route('user.show', $id);
    }

    public function order()
    {
        return $this->model->where('isAdmin', 0)->orderBy('total_ac')->get();
    }


}