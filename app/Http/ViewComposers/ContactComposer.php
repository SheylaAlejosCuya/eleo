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
		$contacts = collect();
		$unread_ids = collect();

		
		if( isset( $user ) ) {

			$unread_ids = \App\Models\tb_message::select(\DB::raw('`from_user_id` as from_user, count(`from_user_id`) as messages_count'))
							->where('to_user_id', $user->id_user)
							->where('read', false)
							->groupBy('from_user_id')
							->get();
			
			if ( $user->isProfessor() ) {

				$contacts = tb_user::whereHas('classroomStudent', function ($q) use ($user) {
					$q->where('id_teacher', $user->id_user);
				})
				->with('imageProfile')
				->get();
				
			} 
			
			if ( $user->isStudent() && isset( $user->id_classroom ) ) {

				$teacher = tb_user::whereHas('classroomProfessor', function ($q) use ($user) {
					$q->where('id_classroom', $user->id_classroom);
				})
				->with('imageProfile')
				->first();

				$contacts->push($teacher);

			}

			if ( count( $contacts ) > 0 ) {

				
				$contacts = $contacts->map(function($contact) use ($unread_ids) {
	
					$contact_unread = $unread_ids->where('from_user', $contact->id_user)->first();
					$contact->unread = $contact_unread ? $contact_unread->messages_count : 0;
		
					return $contact;
				});

			}

		}

		$view->with('contacts', [ 'unread_chats' => $unread_ids, 'contacts' => $contacts ]);
	}
}
