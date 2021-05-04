<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\tb_classroom;
use App\Models\tb_user;

class ContactComposer
{
	public function compose(View $view) {

		$user = Auth::user();
		$contacts = array();
		$unread_ids = array();

		
		if( isset( $user ) ) {

			$unread_ids = \App\Models\tb_message::select(\DB::raw('`from_user_id` as from_user, count(`from_user_id`) as messages_count'))
							->where('to_user_id', $user->id_user)
							->where('read', false)
							->groupBy('from_user_id')
							->get();
			
			// dd($unread_ids);
			
			if ( $user->isProfessor() ) {

				$contacts = tb_user::whereHas('classroomStudent', function ($q) use ($user) {
					$q->where('id_teacher', $user->id_user);
				})
				->with('imageProfile')
				->get();
				
			} else if ( $user->isProfessorAdmin() ) {
				
				$contacts = [];

			} else {

				if(isset($user->id_classroom)){
					$teacher = tb_user::whereHas('classroomProfessor', function ($q) use ($user) {
						$q->where('id_classroom', $user->id_classroom);
					})
					->with('imageProfile')
					->first();
	
					$contacts = collect([ $teacher ]);
				}

				

			}

			if ( count($contacts) > 0 ) {

				
				$contacts = $contacts->map(function($contact) use ($unread_ids) {
	
					$contact_unread = $unread_ids->where('from_user', $contact->id_user)->first();
					$contact->unread = $contact_unread ? $contact_unread->messages_count : 0;
		
					return $contact;
				});

			}

		}

		// dd($unread_ids, $contacts);

		$view->with('contacts', [ 'unread_chats' => $unread_ids, 'contacts' => $contacts ]);
	}
}
