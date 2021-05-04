const state = {
	contacts: [],
	activeChats: []
}

const mutations = {
	SET_CONTACTS(state, { contacts, activeChats }) {
		state.contacts = contacts
		state.activeChats = activeChats
	},
	UPDATE_CONTACT_UNREAD_MESSAGES(state, { contactId, reset }) {

		let getContact = state.contacts.find(user => user.id_user === contactId)

		getContact = Object.assign(getContact, { unread: reset ? 0 : getContact.unread + 1 })

		let activeChatExists = state.activeChats.find(
			(chat) => chat.from_user === contactId
		);

		if (activeChatExists && reset) {

			state.activeChats = state.activeChats.filter(
				(chat) => chat.from_user !== contactId
			);

		}

		if (!activeChatExists && !reset) {

			state.activeChats.push({ from_user: contactId })

		}

	},
	UPDATE_ACTIVE_CHAT(state, contact) {

	},

}

const getters = {
	getContacts: state => state.contacts,
	getActiveChats: state => state.activeChats
}

const actions = {
	setContacts({ commit }, data) {
		commit("SET_CONTACTS", data)
	},
	updateContactMessages({ commit }, contact) {
		commit("UPDATE_CONTACT_UNREAD_MESSAGES", contact)
	},
	updateActiveChat({ commit }, contact) {
		commit("UPDATE_ACTIVE_CHAT", contact)
	},
}
export default {
	state,
	mutations,
	getters,
	actions
}