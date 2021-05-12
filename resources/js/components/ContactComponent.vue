<template>
	<div class="chatbox">
		<div class="chatbox__support">
			<div class="chatbox__header">
				<h5>Contactos</h5>
			</div>
			<ul>
				<div class="chatbox__contacts" v-if="getContacts.length">
					<li v-for="(user, index) in getContacts" :key="index">
						<div
							class="user-avatar"
							:ref="`${$const.REF_CONTACT}-${user.id_user}`"
						>
							<span class="unread" v-if="user.unread">{{
								user.unread
							}}</span>
							<a
								href="#"
								class="user__link"
								role="button"
								tabindex="0"
								@click="addToChatUserList(user)"
							>
								<div class="img-container">
									<img
										:src="`/images/${user.image_profile.avatar}`"
									/>
								</div>
								<div class="user-status-info">
									<span>{{
										`${user.first_name} ${user.last_name}`
									}}</span>
								</div>
							</a>
						</div>
					</li>
				</div>
				<div class="chatbox__contacts__empty" v-else>
					<span>No cuenta con contactos disponibles</span>
				</div>
			</ul>
		</div>
		<div class="chatbox__button">
			<span class="active_chat" v-if="getActiveChats.length">{{
				getActiveChats.length
			}}</span>
			<button>Branch-1</button>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		user: {
			type: Object,
			required: true,
		},
	},
	computed: {
		getContacts() {
			return this.$store.getters.getContacts;
		},
		getActiveChats() {
			return this.$store.getters.getActiveChats;
		},
	},
	methods: {
		addToChatUserList(contact) {
			this.$store.dispatch("addUserToChatList", contact);
			this.updateUnreadCount(contact.id_user, true);
		},
		updateUnreadCount(contactId, reset) {
			this.$store.dispatch("updateContactMessages", { contactId, reset });
		},
	},
};
</script>