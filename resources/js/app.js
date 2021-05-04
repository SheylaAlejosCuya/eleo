require('./bootstrap');

window.Vue = require('vue').default;

import store from "./store";

import variables from './variables'

Vue.prototype.$const = {
    ...variables
}

let handleOutsideClick

Vue.directive('closable', {
    bind(el, binding, vnode) {

        handleOutsideClick = (e) => {
            e.stopPropagation()

            const { handler, exclude } = binding.value

            let clickedOnExcludedEl = false, ref

            exclude.forEach(refName => {

                if (!clickedOnExcludedEl) {

                    const getRef = refName.split("-")[0]
                    const parentElement = getElement = vnode.parent.context.$refs[getRef]

                    let getElement, getRefData

                    if (variables.REF_CONTACT === getRef) {
                        getRefData = parentElement.$refs[refName]
                        getElement = getRefData[0]
                    }

                    if (variables.REF_BUBBLE_CHAT === getRef) {
                        getRefData = parentElement.$children.find(child => child.$refs[refName])
                        getElement = getRefData.$el
                    }

                    if (variables.REF_MINIMIZE_CHAT === getRef) {
                        getRefData = parentElement.$refs[refName]
                        getElement = getRefData[0]
                    }

                    if (getElement) {


                        clickedOnExcludedEl = getElement.contains(e.target);

                        if (clickedOnExcludedEl) {

                            ref = { refName, mainElement: getElement, getRefData }

                        }

                    }
                }
            })

            if (ref) {

                const splitRef = ref.refName.split("-")
                let indexRef = `${variables.REF_BUBBLE_CHAT}-${splitRef[1]}`
                let refName = splitRef[0]

                if (splitRef.length > 2) {

                    indexRef = `${variables.REF_BUBBLE_CHAT}-${splitRef[splitRef.length - 1]}`

                    for (let index = 1; index < splitRef.length - 1; index++) {

                        refName = `${refName}-${splitRef[index]}`

                    }

                }

                const findChildren = vnode.context.$children

                switch (refName) {

                    case variables.REF_CONTACT:

                        let elementContact = findChildren.find(child => child.$refs[indexRef])

                        if (!elementContact) {
                            elementContact = findChildren.find(child => child.$refs[`${variables.REF_DEACTIVATED_CHAT}-${splitRef[1]}`])
                        }

                        elementContact.$refs[variables.REF_INPUT].focus()

                        break;
                    case variables.REF_MINIMIZE_CHAT:

                        let elementMin = findChildren[1]
                        elementMin.$refs[variables.REF_INPUT].focus()

                        break;
                    case variables.REF_BUBBLE_CHAT:

                        let elementChat = findChildren.find(child => child.$refs[indexRef])
                        elementChat.$refs[variables.REF_INPUT].focus()

                        break;

                    default:

                        break;
                }

            }

            if (!el.contains(e.target) && !clickedOnExcludedEl) {

                vnode.context[handler]()

            }
        }

        document.addEventListener('click', handleOutsideClick)
        document.addEventListener('touchstart', handleOutsideClick)
    },

    unbind() {
        document.removeEventListener('click', handleOutsideClick)
        document.removeEventListener('touchstart', handleOutsideClick)
    }
})

Vue.component('chat', require('./components/MainComponent.vue').default);

new Vue({
    el: '#chat-vue',
    store
});