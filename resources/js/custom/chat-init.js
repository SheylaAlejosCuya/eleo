const chatButton = document.querySelector('.chatbox__button');
const chatContent = document.querySelector('.chatbox__support');
const icons = {
    isClicked: '</p><i class="fas fa-comment chat-icon"></i></p>',
    isNotClicked: '<p><i class="fas fa-comment chat-icon"></i></p>'
}
const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);