<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/19/18
 * Time: 5:55 PM
 */

namespace App\Repository\User;


use App\User;

class UserEloquent implements \UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    // yang tadi kamu definisikan dijelaskan disini yo

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model->all();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->model->where('id',$id)->first();
    }

    public function update($request,$id)
    {
        // TODO: Implement update() method.
        $this->model->where('id',$id)->update($request->except('avatar_path','_method','_token'));
        if($request->file('avatar_path')!=null){
            $path = $request->file('avatar_path')->storeAs('user/images',\Carbon\Carbon::now().$this->model->where('id',$id)->first()['username'].$request->file('avatar_path')->getClientOriginalName(),'public');
            $this->model->where('id',$id)->update(Array('avatar_path'=>$path));
        }
        return redirect('/user/'.$id);
    }

    public function order()
    {
        // TODO: Implement order() method.
        return $this->model->where('isAdmin',0)->orderBy('total_ac')->get();
    }


}