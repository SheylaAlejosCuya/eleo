import variables from "../../variables";

const state = {
	minimizedChats: [],
	messageSent: false,
	chatSelected: null,
	notExcludeRefs: [],
	chatMessages: [],
	excludeRefs: [],
	openChats: [],
}

const mutations = {
	SET_ACTIVE_CHAT(state, { action, contact }) {

		switch (action) {
			case variables.STATUS_SELECTED_DEACTIVATED:

				let replaceDeactivateExcludeRef = `${variables.REF_DEACTIVATED_CHAT}-${contact.id_user}`
				let previousExcludeRef = `${variables.REF_BUBBLE_CHAT}-${contact.id_user}`

				let getChatDeactivated = state.openChats.find(chat => chat.id_user === contact.id_user)

				state.excludeRefs.splice(state.excludeRefs.indexOf(previousExcludeRef), 1);

				getChatDeactivated = Object.assign(getChatDeactivated, { isOpen: false, ref: replaceDeactivateExcludeRef })

				state.excludeRefs.push(replaceDeactivateExcludeRef)

				state.chatSelected = null

				return;

			case variables.STATUS_SELECTED_SHOW:

				let replaceShowExcludeRef = `${variables.REF_BUBBLE_CHAT}-${contact.id_user}`
				let previousShowExcludeRef = `${variables.REF_DEACTIVATED_CHAT}-${contact.id_user}`

				let getChatShow = state.openChats.find(chat => chat.id_user === contact.id_user)

				state.excludeRefs.splice(state.excludeRefs.indexOf(previousShowExcludeRef), 1);

				getChatShow = Object.assign(getChatShow, { isOpen: true, ref: replaceShowExcludeRef })

				state.excludeRefs.push(replaceShowExcludeRef)

				if (contact.unreadMessages > 0) {

					let getContact1 = state.openChats.find(chat => chat.id_user === contact.id_user)

					getContact1 = Object.assign(getContact1, { unreadMessages: 0 })

				}

				state.chatSelected = contact

				return

			case variables.STATUS_SELECTED_JUST_SET:

				if (contact.unreadMessages > 0) {

					let getContact2 = state.openChats.find(chat => chat.id_user === contact.id_user)

					getContact2 = Object.assign(getContact2, { unreadMessages: 0 })

				}

				state.chatSelected = contact

				return

			default:

				state.chatSelected = null

				return;
		}

	},
	ADD_USER_TO_CHAT_LIST(state, contact) {

		let isAddedToOpen = state.openChats.find(user => user.id_user == contact.id_user);
		let isAddedToMin = state.minimizedChats.find(user => user.id_user == contact.id_user);

		let excludes = [`${variables.REF_BUBBLE_CHAT}-${contact.id_user}`]

		if (!isAddedToOpen && !isAddedToMin) {

			excludes = [...excludes, `${variables.REF_CONTACT}-${contact.id_user}`]

			state.openChats.push({ ...contact, ref: excludes[0], isOpen: true, unreadMessages: 0 })

			if (state.openChats.length > 2) {

				const getFirstElement = Object.assign({}, state.openChats[0])

				state.minimizedChats.push(getFirstElement)

				state.openChats.shift()

				state.excludeRefs.splice(state.excludeRefs.indexOf(`${variables.REF_BUBBLE_CHAT}-${getFirstElement.id_user}`), 1);

				excludes = [...excludes, `${variables.REF_MINIMIZE_CHAT}-${getFirstElement.id_user}`]

			}

			state.excludeRefs.push(...excludes)

		}

		if (isAddedToMin) {

			const getFirstElement = Object.assign({}, state.openChats[0])

			state.minimizedChats = state.minimizedChats.filter(chat => chat.id_user !== contact.id_user)

			state.minimizedChats.push(getFirstElement)

			excludes = [...excludes, `${variables.REF_MINIMIZE_CHAT}-${getFirstElement.id_user}`]

			state.openChats.shift()

			state.openChats.push({ ...contact, ref: excludes[0], isOpen: true })

			state.excludeRefs.splice(state.excludeRefs.indexOf(`${variables.REF_BUBBLE_CHAT}-${getFirstElement.id_user}`), 1);

			state.excludeRefs.splice(state.excludeRefs.indexOf(`${variables.REF_MINIMIZE_CHAT}-${contact.id_user}`), 1);

			state.excludeRefs.push(...excludes)

		}

		if (isAddedToOpen) {

			const splitRef = isAddedToOpen.ref.split("-")

			if (splitRef.length > 2) {

				state.excludeRefs.splice(state.excludeRefs.indexOf(isAddedToOpen.ref), 1);

				isAddedToOpen = Object.assign(isAddedToOpen, { isOpen: true, ref: excludes[0] })

				state.excludeRefs.push(...excludes)

			}

		}

		state.chatSelected = contact

	},
	REMOVE_USER_FROM_CHAT_LIST(state, userId) {

		state.openChats = state.openChats.filter(
			userToChatWith => userToChatWith.id_user !== userId
		)

		let removeItems = [`${variables.REF_BUBBLE_CHAT}-${userId}`, `${variables.REF_CONTACT}-${userId}`]

		state.excludeRefs.splice(state.excludeRefs.indexOf(removeItems[0]), 1);
		state.excludeRefs.splice(state.excludeRefs.indexOf(removeItems[1]), 1);

		if (state.minimizedChats.length > 0) {

			const getFirstElement = Object.assign({}, state.minimizedChats[0])

			state.openChats.push(getFirstElement)

			state.minimizedChats.shift()

			state.excludeRefs.splice(state.excludeRefs.indexOf(`${variables.REF_MINIMIZE_CHAT}-${getFirstElement.id_user}`), 1);

			state.excludeRefs.push(`${variables.REF_BUBBLE_CHAT}-${getFirstElement.id_user}`);

		}

		state.chatSelected = null

	},
	SET_MESSAGE_HAS_BEEN_SENT(state, status) {

		state.messageSent = status

	},
	ADD_CHAT_MESSAGES_TO_USER(state, { messages, chatWith }) {

		let getChat = state.chatMessages.find(chat => chat.chatWith == chatWith)

		if (!getChat) {

			getChat = state.chatMessages.push({ chatWith, messages: messages })

		} else {

			getChat.messages.push(...messages)

		}
	},
	SET_MESSAGE_TO_USER(state, { message, chatWith }) {

		let getMessages = state.chatMessages.find(chat => chat.chatWith === chatWith)

		if (!getMessages) store.chatMessages.push({ chatWith, messages: [...message] })
		else getMessages.messages.unshift(message)

	},
	SHOW_CHAT_CONTACT(state, contact) {

		let excludes = [`${variables.REF_BUBBLE_CHAT}-${contact.id_user}`]

		const getFirstElement = Object.assign({}, state.openChats[0])

		state.minimizedChats = state.minimizedChats.filter(
			userToChatWith => userToChatWith.id_user !== contact.id_user
		)

		state.minimizedChats.push(getFirstElement)

		excludes = [...excludes, `${variables.REF_MINIMIZE_CHAT}-${getFirstElement.id_user}`]

		state.openChats.shift()

		state.openChats.push({ ...contact, ref: excludes[0] })

		state.excludeRefs.splice(state.excludeRefs.indexOf(`${variables.REF_MINIMIZE_CHAT}-${contact.id_user}`), 1);
		state.excludeRefs.splice(state.excludeRefs.indexOf(`${variables.REF_BUBBLE_CHAT}-${getFirstElement.id_user}`), 1);

		state.excludeRefs.push(...excludes)

		state.chatSelected = contact

	},

	UPDATE_UNREAD_MESSAGES(state, { contactId, message }) {

		let isOpenChat = state.openChats.find(chat => chat.id_user === contactId)
		let isMinChat = state.minimizedChats.find(chat => chat.id_user === contactId)

		let getMessages = state.chatMessages.find(chat => chat.chatWith === contactId)

		if (isOpenChat && state.chatSelected !== contactId) {

			getMessages.messages.unshift(message)
			isOpenChat = Object.assign(isOpenChat, { unreadMessages: isOpenChat.unreadMessages + 1 })

		}

		if (isMinChat) {

			getMessages.messages.unshift(message)
			isMinChat = Object.assign(isMinChat, { unreadMessages: isMinChat.unreadMessages + 1 })

		}

	}
}

const getters = {
	chatMessages: state => to => state.chatMessages.find(chat => chat.chatWith === to),
	getOpenChats: state => state.openChats,
	getMinimizedChats: state => state.minimizedChats,
	getActiveChat: state => state.chatSelected,
	getExcludeRefs: state => state.excludeRefs,
}

const actions = {
	addUserToChatList({ commit }, newUser) {
		commit("ADD_USER_TO_CHAT_LIST", newUser)
	},

	removeUserFromChatList({ commit }, userId) {
		commit("REMOVE_USER_FROM_CHAT_LIST", userId)
	},

	addChatMessagesToUser({ commit }, newMessages) {
		commit("ADD_CHAT_MESSAGES_TO_USER", newMessages)
	},

	setMessageToUser({ commit }, newMessage) {
		commit("SET_MESSAGE_TO_USER", newMessage)
	},

	setActiveChat({ commit }, contact) {
		commit('SET_ACTIVE_CHAT', contact)
	},

	showChatContact({ commit }, info) {
		commit('SHOW_CHAT_CONTACT', info)
	},

	updateUnreadMessages({ commit }, info) {
		commit("UPDATE_UNREAD_MESSAGES", info)
	}
}
export default {
	state,
	mutations,
	getters,
	actions
}