<template>
	<div
		:class="[onlineUser.isOpen ? 'chat-bubble open' : 'chat-bubble']"
		:ref="onlineUser.ref"
	>
		<ChatboxHeaderComponent :onlineUser="onlineUser" />

		<ChatboxBodyComponent
			:chatWith="onlineUser"
			@click.native="selectChatWith"
		/>

		<div class="chat-footer">
			<input
				v-model="messageInput"
				@click="selectChatWith"
				type="textarea"
				:ref="$const.REF_INPUT"
				@keyup.enter="sendMessage"
				@keyup.esc="removeUserChatlist(onlineUser.id_user)"
				placeholder="Escriba un mensaje..."
			/>
		</div>
	</div>
</template>

<script>
import ChatboxBodyComponent from "./Chatbox/ChatboxBodyComponent.vue";
import ChatboxHeaderComponent from "./Chatbox/ChatboxHeaderComponent.vue";

export default {
	components: { ChatboxHeaderComponent, ChatboxBodyComponent },
	props: {
		onlineUser: {
			type: Object,
			default: null,
		},
		currentUser: {
			type: Object,
			required: true,
		},
	},
	data() {
		return {
			messageInput: "",
		};
	},
	methods: {
		sendMessage() {
			const newMessage = {
				message: this.messageInput,
				to_user_id: this.onlineUser.id_user,
			};

			this.$store.dispatch("setMessageToUser", {
				message: newMessage,
				chatWith: newMessage.to_user_id,
			});

			axios
				.post("/messagesTo", {
					message: this.messageInput,
					to: this.onlineUser.id_user,
				})
				.then(() => console.log("send"));

			this.messageInput = "";
		},

		removeUserChatlist(userId) {
			this.$store.dispatch("removeUserFromChatList", userId);
		},
		selectChatWith() {
			this.$emit("selected", this.onlineUser);
		},
		closeEvent() {
			this.$emit("selected", null);
		},
	},
};
</script>