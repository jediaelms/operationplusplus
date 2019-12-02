<style>
.chat_window {
  display: none;
  position: fixed;
  width: calc(20% - 20px);
  max-width: 800px;
  height: 600px;
  border-radius: 10px;
  background-color: #fff;
  left: 80%;
  bottom: 0%;
  /* transform: translateX(-50%) translateY(-50%); */
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
  background-color: #f8f8f8;
  overflow: hidden;
  font-family: "Calibri", "Roboto", sans-serif;
  z-index: 10000;
}

.top_menu {
  background-color: #fff;
  width: 100%;
  padding: 20px 0 15px;
  box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
}
.top_menu .buttons {
  margin: 3px 0 0 20px;
  position: absolute;
}
.top_menu .buttons .button {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  display: inline-block;
  margin-right: 10px;
  position: relative;
}
.top_menu .buttons .button.close {
  background-color: #f5886e;
  font-size: 12px;
  text-align: center;
  padding: 8%;
  color: white;
}
.top_menu .buttons .button.minimize {
  background-color: #fdbf68;
}
.top_menu .buttons .button.maximize {
  background-color: #a3d063;
}
.top_menu .title {
  text-align: center;
  color: #bcbdc0;
  font-size: 20px;
}

.messages {
  position: relative;
  list-style: none;
  padding: 20px 10px 0 10px;
  margin: 0;
  height: 447px;
  overflow: scroll;
  overflow-x: hidden;
}
.messages .message {
  clear: both;
  overflow: hidden;
  margin-bottom: 20px;
  transition: all 0.5s linear;
  opacity: 0;
}
.messages .message.left .avatar {
  background-color: #f5886e;
  float: left;
  background-image: url("https://cdn.iconscout.com/icon/free/png-256/avatar-369-456321.png");
  background-size: contain;
}
.messages .message.left .text_wrapper {
  background-color: #ffe6cb;
  margin-left: 20px;
}
.messages .message.left .text_wrapper::after, .messages .message.left .text_wrapper::before {
  right: 100%;
  border-right-color: #ffe6cb;
}
.messages .message.left .text {
  color: #c48843;
}
.messages .message.right .avatar {
  background-color: #fdbf68;
  float: right;
  background-image: url("https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/10_avatar-512.png");
  background-size: contain;
}
.messages .message.right .text_wrapper {
  background-color: #c7eafc;
  margin-right: 20px;
  float: right;
}
.messages .message.right .text_wrapper::after, .messages .message.right .text_wrapper::before {
  left: 100%;
  border-left-color: #c7eafc;
}
.messages .message.right .text {
  color: #45829b;
}
.messages .message.appeared {
  opacity: 1;
}
.messages .message .avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: inline-block;
}
.messages .message .text_wrapper {
  display: inline-block;
  padding: 10px;
  border-radius: 6px;
  width: calc(100% - 85px);
  min-width: 100px;
  position: relative;
}
.messages .message .text_wrapper::after, .messages .message .text_wrapper:before {
  top: 18px;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.messages .message .text_wrapper::after {
  border-width: 13px;
  margin-top: 0px;
}
.messages .message .text_wrapper::before {
  border-width: 15px;
  margin-top: -2px;
}
.messages .message .text_wrapper .text {
  font-size: 18px;
  font-weight: 300;
}

.bottom_wrapper {
  position: relative;
  width: 100%;
  background-color: #fff;
  padding: 20px 20px;
  position: absolute;
  bottom: 0;
}
.bottom_wrapper .message_input_wrapper {
  display: inline-block;
  height: 50px;
  border-radius: 25px;
  border: 1px solid #bcbdc0;
  width: 65%;
  position: relative;
  padding: 0 2%;
  margin-left: 2%;
}
.bottom_wrapper .message_input_wrapper .message_input {
  border: none;
  height: 100%;
  box-sizing: border-box;
  width: 95%;
  position: absolute;
  outline-width: 0;
  color: gray;
}
.send_file {
    float: left !important;
}
.bottom_wrapper .send_message {
  width: 15%;
  height: 50px;
  display: inline-block;
  border-radius: 50px;
  background-color: #a3d063;
  border: 2px solid #a3d063;
  color: #fff;
  cursor: pointer;
  transition: all 0.2s linear;
  text-align: center;
  float: right;
}
.bottom_wrapper .send_message:hover {
  color: #a3d063;
  background-color: #fff;
}
.bottom_wrapper .send_message .text {
  font-size: 18px;
  font-weight: 300;
  display: inline-block;
  line-height: 48px;
  /* padding: 25% 25%; */
}

.message_template {
  display: none;
}
.text_wrapper .time{
    color: gray;
    margin-bottom: 1px;
}
</style>
<!------ Include the above in your HEAD tag ---------->
<div class="chat_window">
    <div class="top_menu">
        <div class="buttons">
            <div class="button close">x</div>
        </div>
        <div class="title">Chat - Dr. Rancho Cruts</div>
        <input type="hidden" id="destinatario" value="4"/>
        <input type="hidden" id="remetente" value="1"/>
    </div>
    <ul class="messages"></ul>
    <div class="bottom_wrapper clearfix">
        <div class="send_message send_file">
                <div class="icon"></div>
                <div class="text"><i class="fas fa-fw  fa-file-image"></i></div>
        </div>
        <div class="message_input_wrapper">
            <input class="message_input" placeholder="Escreva sua mensagem..." />
        </div>
        <div class="send_message" onclick=sendMessage(<?=1;?>)>
            <div class="icon"></div>
            <div class="text"><i class="fas fa-fw  fa-paper-plane"></i></div>
        </div>
    </div>
    </div>
    <div class="message_template">
        <li class="message">
            <div class="text_wrapper">
                <div class="text"></div>
                <b class="time"></b>
            </div>
        </li>
    </div>
</body>