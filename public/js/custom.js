class InteractiveChatbox{constructor(t,o,s){this.args={button:t,chatbox:o},this.icons=s,this.state=!1}display(){const{button:t,chatbox:o}=this.args;t.addEventListener("click",(()=>this.toggleState(o)))}toggleState(t){this.state=!this.state,this.showOrHideChatBox(t,this.args.button)}showOrHideChatBox(t,o){this.state?(t.classList.add("chatbox--active"),this.toggleIcon(!0,o)):this.state||(t.classList.remove("chatbox--active"),this.toggleIcon(!1,o))}toggleIcon(t,o){const{isClicked:s,isNotClicked:e}=this.icons;t?o.lastElementChild.innerHTML=s:t||(o.lastElementChild.innerHTML=e)}}const chatButton=document.querySelector(".chatbox__button"),chatContent=document.querySelector(".chatbox__support"),icons={isClicked:"</p>Clicked!</p>",isNotClicked:"<p>Not clicked!</p>"},chatbox=new InteractiveChatbox(chatButton,chatContent,icons);chatbox.display(),chatbox.toggleIcon(!1,chatButton);
