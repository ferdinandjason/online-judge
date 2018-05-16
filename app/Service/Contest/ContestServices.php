<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 5/16/18
 * Time: 9:25 PM
 */

namespace App\Service\Contest;


class ContestServices
{
    protected $repo;

    public function __construct(\ContestRepository $contestRepository)
    {
        $this->repo = $contestRepository;
    }

    public function all(){
        return $this->repo->all();
    }

    public function validator($request){
        return $request->validate([
            'name'=>'required|string',
            'start_time'=>'required',
            'start_time_'=>'required',
            'freeze_time'=>'required',
            'freeze_time_'=>'required',
            'end_time'=>'required',
            'end_time_'=>'required'
        ]);
    }

    public function prosesPostData($post_data){
        $post_data['start_time'] .= ' '.$post_data['start_time_'];
        $post_data['freeze_time'] .= ' '.$post_data['freeze_time_'];
        $post_data['end_time'] .= ' '.$post_data['end_time_'];
        if ($post_data['active'] == 'on') $post_data['active']=1;
        else $post_data['active']=0;

        $post_data['start_time'] = \Carbon\Carbon::parse($post_data['start_time']);
        $post_data['freeze_time'] = \Carbon\Carbon::parse($post_data['freeze_time']);
        $post_data['end_time'] = \Carbon\Carbon::parse($post_data['end_time']);

        $data = Array('name'=>$post_data['name'] , 'start_time'=>$post_data['start_time'] ,'freeze_time'=>$post_data['freeze_time'], 'end_time'=>$post_data['end_time'],'visible'=>$post_data['active'],'description'=>$post_data['description']);

        return $data;
    }

    public function create($data){
        $this->repo->create($data);
    }

    public function update($id,$data){
        $this->repo->update($id,$data);
    }

    public function getContest($id){
        return $this->repo->findFirst($id);
    }

    public function delete($id){
        $this->repo->delete($id);
    }
}