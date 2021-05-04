<template>
	<div class="chat-header">
		<div class="user-avatar" ref="headerChatBox" @click="toggleBody">
			<div class="img-container">
				<img :src="`/images/${onlineUser.image_profile.avatar}`" />
			</div>
			<div class="user-status-info">
				<a>{{ `${onlineUser.first_name} ${onlineUser.last_name}` }}</a>
				<p>Active now</p>
			</div>
		</div>

		<div class="chat-comm">
			<nav>
				<a href="#" @click="removeUserChatlist(onlineUser.id_user)">
					<img :src="'/icons/close.svg'" />
				</a>
			</nav>
		</div>
	</div>
</template>

<script>
import variables from "../../variables";

export default {
	props: {
		onlineUser: {
			type: Object,
			default: null,
		},
	},
	methods: {
		toggleBody() {
			const action = this.onlineUser.isOpen
				? variables.STATUS_SELECTED_DEACTIVATED
				: variables.STATUS_SELECTED_SHOW;

			if (this.onlineUser.unreadMessages > 0) {
				this.updateUnreadStatus(this.onlineUser.id_user);

				this.$store.dispatch("updateContactMessages", {
					contactId: this.onlineUser.id_user,
					reset: true,
				});
			}

			this.$store.dispatch("setActiveChat", {
				action,
				contact: this.onlineUser,
			});
		},
		removeUserChatlist(userId) {
			this.$store.dispatch("removeUserFromChatList", userId);
		},
		updateUnreadStatus(contactId) {
			axios
				.post("/updateUnread", { from: contactId })
				.then(() => console.log("update"))
				.catch(() => console.log("error"));
		},
	},
};
</script>
