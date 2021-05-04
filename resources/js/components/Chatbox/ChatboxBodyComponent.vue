<template>
	<div class="chat-body">
		<div
			class="container-messages"
			v-for="(message, index) in getChatMessages"
			:key="`message-${index}`"
		>
			<div class="sender-me" v-if="message.to_user_id === chatWith.id_user">
				<div class="my-message">{{ message.message }}</div>
			</div>
			<div class="sender-other" v-else>
				<div class="user-avatar">
					<div class="img-container">
						<img src="https://source.unsplash.com/random/35x35" />
					</div>
					<div class="other-message">
						{{ message.message }}
					</div>
				</div>
			</div>
		</div>
		<div class="container-messages">
			<observe
				v-if="getChatMessages && maxPage > page"
				@intersect="intersect"
			/>
		</div>
	</div>
</template>

<script>
import Observe from "../Observe.vue";
export default {
	components: { Observe },
	data() {
		return {
			page: 1,
			maxPage: 1,
		};
	},
	props: {
		chatWith: {
			type: Object,
		},
	},
	created() {
		this.getUserMessages();
	},
	computed: {
		getChatMessages() {
			const chatInfo = this.$store.getters.chatMessages(this.chatWith.id_user);
			return chatInfo?.messages;
		},
	},
	methods: {
		intersect() {
			if (this.page >= this.maxPage) return;

			this.page++;
			this.getUserMessages();
		},
		getUserMessages() {
			axios
				.get(`/messagesUser/${this.chatWith.id_user}?page=${this.page}`)
				.then((response) => {
					this.maxPage = response.data.messages.last_page;
					this.$store.dispatch("addChatMessagesToUser", {
						messages: response.data.messages.data,
						chatWith: this.chatWith.id_user,
					});
				})
				.catch(() => console.log("error"));
		},
	},
};
</script>