<template>
	<div class="usersChatList" v-if="getMinimizedChats.length">
		<div class="card">
			<a @click="expandChatList()">
				<div class="card-header">
					<p class="card-header-title">
						<span class="tag is-primary">{{
							getMinimizedChats.length
						}}</span
						>&nbsp; Chats Activos
					</p>
				</div>
			</a>
			<div
				id="userListBox"
				class="card-content"
				v-show="showChatList"
				:class="{ show: showChatList }"
			>
				<article
					v-for="(user, index) in getMinimizedChats"
					:key="`minimized-${index}`"
					class="media"
					:ref="`${$const.REF_MINIMIZE_CHAT}-${user.id_user}`"
					@click="showUsuario(user)"
				>
					<figure class="media-left">
						<p class="image is-32x32">
							<img
								src="http://bulma.io/images/placeholders/32x32.png"
							/>
						</p>
					</figure>
					<div class="media-content">
						<div class="content">
							<p>
								<strong>{{ user.name }}</strong>
								<br />
							</p>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			showChatList: false,
		};
	},
	computed: {
		getMinimizedChats() {
			return this.$store.getters.getMinimizedChats;
		},
	},
	methods: {
		expandChatList() {
			$("#userListBox").slideToggle();
			this.showChatList = !this.showChatList;
		},
		showUsuario(contact) {
			this.$store.dispatch("showChatContact", contact);
		},
	},
};
</script>