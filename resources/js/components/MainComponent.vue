<template>
	<div class="home-page-wrapper">
		<ContactComponent :ref="$const.REF_CONTACT" :user="user" />
		<ChatComponent :ref="$const.REF_BUBBLE_CHAT" :user="user" />
		<MinimizedChatsComponent :ref="$const.REF_MINIMIZE_CHAT" />
	</div>
</template>

<script>
import ContactComponent from "./ContactComponent.vue";
import ChatComponent from "./ChatComponent.vue";
import MinimizedChatsComponent from "./MinimizedChatsComponent.vue";

export default {
	components: {
		MinimizedChatsComponent,
		ContactComponent,
		ChatComponent,
	},
	props: {
		contacts: {
			type: Array,
			default: [],
		},
		active: {
			type: Array,
			required: true,
			default: [],
		},
		user: {
			type: Object,
			required: true,
		},
	},
	created() {
		this.$store.dispatch("setContacts", {
			contacts: this.contacts,
			activeChats: this.active,
		});

		Echo.private(`chat.${this.user.id_user}`).listen("PrivateChatEvent", (e) => {
			console.log("new message");
			this.handleIncoming(e.message);
		});
	},
	methods: {
		handleIncoming(message) {
			const activeChat = this.$store.getters.getActiveChat;

			if (activeChat && message.from_user_id === activeChat.id_user) {
				this.$store.dispatch("setMessageToUser", {
					message: message,
					chatWith: message.from_user_id,
				});

				this.updateUnreadStatus(activeChat.id_user);

				return;
			}

			this.updateUnreadCount(message, false);
		},
		updateUnreadCount(message, reset) {
			this.$store.dispatch("updateContactMessages", {
				contactId: message.from_user_id,
				reset,
			});

			this.$store.dispatch("updateUnreadMessages", {
				contactId: message.from_user_id,
				message,
			});
		},

		updateUnreadStatus(contactId) {
			axios
				.post("/updateUnread", { from: contactId })
				.then(() => console.log("update"))
				.catch((error) => console.log("error", error));
		},
	},
};
</script>