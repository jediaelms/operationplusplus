var geNewMessages = function () {
    let destinatario = $('#destinatario').val();
    let remetente = $('#remetente').val();
    // alert(remetente);
    $.ajax({
        url: "tables/get-messages.php",
        type: 'post',
        dataType: "json",
        data: {
            new: 1,
            usuario_remetente: destinatario,
            usuario_destinatario: remetente
        }
    })
        .done(function (msg) {
            var $messages, message;
            for (let i in msg) {
                console.log(msg);
                $messages = $('.messages');
                message = new Message({
                    text: msg[i].msg,
                    message_side: "left",
                    date: msg[i].data_hora
                });
                message.draw();
                $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
            }
        })
        .fail(function (jqXHR, textStatus, msg) {
            // alert(msg);
        });
}
$(".open").click(function () {
    $(".chat_window").slideDown();
});
$(".close").click(function () {
    $(".chat_window").slideUp();
});
var Message;
Message = function (arg) {
    this.text = arg.text, this.message_side = arg.message_side;
    this.date = arg.date;
    this.draw = function (_this) {
        return function () {
            var $message;
            $message = $($('.message_template').clone().html());
            $message.addClass(_this.message_side).find('.text').html(_this.text);
            $message.find('.time').html(_this.date);
            $('.messages').append($message);
            return setTimeout(function () {
                return $message.addClass('appeared');
            }, 0);
        };
    }(this);
    return this;
};
var getMessageText, message_side, sendMessageLocal;
message_side = 'right';
getMessageText = function () {
    var $message_input;
    $message_input = $('.message_input');
    return $message_input.val();
};
sendMessageLocal = function (text) {
    var now = new Date();
    var localDateTime = now.getDate() +
        "/" + (now.getMonth() + 1) +
        "/" + (now.getFullYear()) +
        " " + (now.getHours()) +
        ":" + (now.getMinutes());

    var $messages, message;
    if (text.trim() === '') {
        return;
    }
    $('.message_input').val('');
    $messages = $('.messages');
    message = new Message({
        text: text,
        message_side: message_side,
        date: localDateTime

    });
    message.draw();
    return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
};
$('.send_message').click(function (e) {
    return sendMessageLocal(getMessageText());
});
$('.message_input').keyup(function (e) {
    if (e.which === 13) {
        return sendMessage();
    }
});
// sendMessageLocal('Bom Dia Doutor, hoje eu estou me sentindo uma batata...');
// setTimeout(function () {
//     return sendMessageLocal('Olá! Isso é natural depois de se tornar um helicóptero de combate.');
// }, 1000);
// return setTimeout(function () {
//     return sendMessageLocal('Mas como assim? Eu não fiz uma operação para virar um helicóptero de combate....');
// }, 2000);
var openMessages = function (remetente, destinatario) {
    $('#destinatario').val(destinatario);
    $('#remetente').val(remetente);
    if (remetente == undefined) remetente = $('#remetente').val();
    $.ajax({
        url: "tables/get-messages.php",
        type: 'post',
        dataType: "json",
        data: {
            usuario_remetente: remetente,
            usuario_destinatario: destinatario
        },
        beforeSend: function () {
            // alert("Pegando");
        }
    })
        .done(function (msg) {
            $('.messages').html("");
            console.log(msg);
            var $messages, message, side;
            $('div .title').text(msg[0].nome);
            for (let i in msg) {
                if (i == 0) continue;
                $messages = $('.messages');

                side = msg[i].usuario_remetente == remetente ? 'right' : 'left';
                message = new Message({
                    text: msg[i].msg,
                    message_side: side,
                    date: msg[i].data_hora
                });
                message.draw();
            }
            $(".chat_window").slideDown();
            $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
        })
        .fail(function (jqXHR, textStatus, msg) {
            // alert(msg);
        });
    setInterval(geNewMessages, 500);
}
var sendMessage = function (remetente) {
    var $destinatario = $('#destinatario').val();
    remetente = $('#remetente').val();
    var $message_input = $('.message_input');
    var men = $message_input.val();
    sendMessageLocal($message_input.val());
    $.ajax({
        url: "cad/send-message.php",
        type: 'post',
        data: {
            msg: men,
            usuario_remetente: remetente,
            usuario_destinatario: $destinatario
        },
        beforeSend: function () {
            // alert("Enviando");
        }
    })
        .done(function (msg) {
            let result = msg;
        })
        .fail(function (jqXHR, textStatus, msg) {
            // alert(msg);
        });

}
