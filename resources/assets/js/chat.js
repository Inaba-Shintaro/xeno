$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.messageInputForm_input').keypress(function (event) {
        if(event.which === 13){
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/xenos/chat',
                data: {
                    chat_room_id: chat_room_id,
                    user_id: user_id,
                    message: $('.messageInputForm_input').val(),
                },
            
            })
            
            .done(function(data){
                event.target.value = '';
            });

        }
    });

    window.Echo.channel('ChatRoomChannel')
    .listen('ChatPusher', (e) => {
        console.log(e, e.message.user_id);
        if(e.message.user_id === user_id){
            console.log(e.message.message);
            console.log(true);
            $('.tests').append('<div class="mycomment"><p>'+ e.message.message +'</p></div>');
        }
        else{
            console.log(e.message.message);
            console.log(false);
            $('.tests').append('<div class="mycomment"><p>'+ e.message.message +'</p></div>');
        }
    });


});