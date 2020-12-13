<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AvatarResource;
use App\Models\Avatar;
use App\Repositories\AvatarRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{
    private $r;
    private $auth;

    public function __construct (Auth $auth, AvatarRepository $avatarRepository){
        $this->r = $avatarRepository;
        $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avatars = $this->r->getAll();
        return response([ 'avatars' => AvatarResource::collection($avatars), 'message' => 'Retrieved successfully'], 200);
    }

    public function getUserAvatars($id){

        $avatars = $this->r->getAvatars($id);
        return response([ 'avatars' => AvatarResource::collection($avatars), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $avatar  = $this->r->createAvatar(
            $request->get('name'),
            $request->get('user_id')
        );
       // $avatar = Avatar::create($data);
        return response(['avatar' => new AvatarResource($avatar), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avatar = Avatar::findOrFail($id);
        return response(['avatar' => new AvatarResource($avatar), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avatar $avatar)
    {
        $validator = Validator::make($request->all(), [  
            'name' => 'required', 
            'user_id' => 'required'
        ]);  
    
        if ($validator->fails()) {  
            return response()->json($validator->errors()->toArray(), 422);  
        };
        
        $avatar->update($request->all());
        return response(['avatar' => new AvatarResource($avatar), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Avatar::findOrFail($id)->delete();
        return response(['message' => 'Deleted'], 200);
    }
}
