const chatButton = document.querySelector('.chatbox__button');
const chatContent = document.querySelector('.chatbox__support');
const icons = {
    isClicked: '</p><img class="chat-icon" src="/icons/icon_chat.svg" alt="" /></p>',
    isNotClicked: '<p><img class="chat-icon" src="/icons/icon_chat.svg" alt="" /></p>'
}
const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);