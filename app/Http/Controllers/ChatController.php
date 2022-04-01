<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
		
	/**
	 * Joining chat
	 *
	 * @param  mixed $req
	 * @return void
	 */
	public function join(Request $req)
	{
		$data = $req->validate([
			'code'=>'required|size:10|exists:chats,join_code'
		]);
		$chat = Chat::firstWhere('join_code', $data['code']);
		if (!$chat->isUserInChat($req->user())) {
			$chat->addMember($req->user());
		} else {
			return response()->json([
				'error' => 'error',
				'message' => __('user.in_chat')
			]);
		}
	}

		
	/**
	 * Leaving from chat
	 *
	 * @param  mixed $req
	 * @return void
	 */
	public function leave(Request $req)
	{
		$data = $req->validate([
			'id'=>'required|numeric|exists:chats'
		]);
		$chat = Chat::findOrFail($data['id']);
		if ($chat->isUserInChat($req->user())) {
			$chat->removeMember($req->user());
		}
	}

	
	/**
	 * kicks user
	 *
	 * @param  mixed $req
	 * @return void
	 */
	public function kick(Request $req)
	{
		$data = $req->validate([  // validating
			'id'=>'required|numeric|exists:chats',
			'user_id'=>'required|numeric|exists:users,id',
		]);

		$chat = Chat::findOrFail($data['id']);  // find chat object
		if (!$chat->isUserInChat($req->user()))  // if current user is not in chat return error
			abort(403);

		$role = $chat->members()->where('user_id', '=', $req->user()->id)->first()->getRole();  // get user role in that chat
		if ($role == 'member')  // if you not admin return error
			abort(403);
			
		$user = User::findOrFail($data['user_id']);  // finding user that we kick
		if (!$chat->isUserInChat($user))  // if that user is not in chat return error
			abort(403);

		$chat->removeMember($user);  // kicking
	}

	
	/**
	 * Setting avatar to chat_id 
	 *
	 * @param  mixed $req
	 * @return void
	 */
	public function setAvatar(Request $req)
	{
		abort(503);
	}

	
	/**
	 * Returning chat view
	 *
	 * @param  mixed $req
	 * @return void
	 */
	public function index(Request $req)
	{
		$data = $req->validate([  // validating
			'pid'=>'numeric|exists:chats'
		]);
		if (!array_key_exists('pid', $data) or $data['pid'] == 0) // if no pid or pid = 0 
			return redirect(route('home'));
		$chat = Chat::findOrFail($data['pid']);  // getting requested chat
		if (!$chat->isUserInChat($req->user()))  // if requesting user is not in chat return error
			abort(403);
		return view('chat', ['chat' => $chat]);  // return chat view
	}
	
	/**
	 * Creates new chat 
	 *
	 * @param  mixed $req
	 * @return void
	 */
	public function create(Request $req)
	{
		$data = $req->validate([  // validating
			'name' => 'min:1|max:50',
			'members' => 'array|max:50'
		]);
		$name = $data['name'] ?? 'Новая беседа';
		$chat = Chat::create([
			'name' => $name
		]);
		$chat->addMember($req->user())->role = 'creator';
		foreach($data['members'] as $uid) {
			$user = User::find($uid);
			if (!!$user)
				$chat->addMember($user);
		}
	}
}
