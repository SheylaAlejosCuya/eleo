<template>
	<div
		class="chats"
		v-if="getOpenChats.length"
		v-closable="{
			exclude: getExcludeRefs,
			handler: 'unselectContact',
			notExclude: ['headerChatBox'],
		}"
	>
		<ChatboxComponent
			v-for="contact in getOpenChats"
			:key="`chat-${contact.id_user}`"
			:current-user="user"
			:online-user="contact"
			@selected="selectChat"
		/>
	</div>
</template>

<script>
import ChatboxComponent from "./ChatboxComponent.vue";
import variables from "../variables";

export default {
	components: {
		ChatboxComponent,
	},
	props: {
		user: {
			type: Object,
			required: true,
		},
	},
	computed: {
		getOpenChats() {
			return this.$store.getters.getOpenChats;
		},
		getExcludeRefs() {
			return this.$store.getters.getExcludeRefs;
		},
	},
	methods: {
		selectChat(contact) {
			const activeChat = this.$store.getters.getActiveChat;

			if (activeChat && contact.id_user === activeChat.id_user) return;

			if (contact && contact.unreadMessages > 0) {
				this.updateUnreadStatus(contact.id_user);

				this.$store.dispatch("updateContactMessages", {
					contactId: contact.id_user,
					reset: true,
				});
			}

			this.$store.dispatch("setActiveChat", {
				action: variables.STATUS_SELECTED_JUST_SET,
				contact,
			});
		},
		unselectContact() {
			this.$store.dispatch("setActiveChat", {
				action: variables.STATUS_SELECTED_DEFAULT,
			});
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