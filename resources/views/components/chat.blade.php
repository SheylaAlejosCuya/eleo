<chat :contacts="{{ $contacts['contacts'] }}" :active="{{ $contacts['unread_chats'] }}" :user="{{ auth()->user() }}"></chat>