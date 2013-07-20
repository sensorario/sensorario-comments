$(function(){
    function loadContents(semanticId) {
        $.ajax({
            url: 'index.php?r=SensorarioModuleComment/comments/number&semanticId=' + semanticId,
            dataType: 'json',
            success: function(json) {
                if(json.message) {
                    alert(json.message);
                } else {
                    $('#number_comment_' + semanticId).html('totale commenti: ' + json.totaleCommenti);
                    $('#comments_comment_' + semanticId).html('');
                    for(commento in json.commenti) {
                        $('#comments_comment_' + semanticId)
                        .append($('<span>').addClass('SensorarioModuleCommentDateTime').html(json.commenti[commento].datetime))
                        .append($('<strong>').addClass('SensorarioModuleCommentUser').html(json.commenti[commento].user))
                        .append($('<span>').addClass('SensorarioModuleCommentComment').html(json.commenti[commento].comment))
                        .append('<br>');
                        if(json.commenti[commento].owner) {
                            $('#comments_comment_' + semanticId)
                            .append($('<div>').html('<a href="javascript:void(0);" delete="index.php?r=SensorarioModuleComment/comments/delete&id='+json.commenti[commento].id+'" class="deleteLink">delete</a>'))
                            $('.deleteLink').click(function(){
                                $.ajax({
                                    url: $(this).attr('delete'),
                                    dataType: 'json',
                                    success: function(json) {
                                        if(json.success) {
                                            alert('Comment delete successfully!!!');
                                            loadContents(semanticId);
                                        }
                                    }
                                });
                            });
                        }
                    }
                }
            }
        });
    }
    $.each($('div[rel=SensorarioModuleComment]'),function(){
        var form_comment_id = 'form_comment_' + $(this).attr('id');
        var semanticId = $(this).attr('id');
        var field_name = '_comment_' + semanticId;
        var username = $(this).attr(semanticId+'-user');
        $(this).append($('<div>').addClass('totaleCommenti').attr('id','number'+field_name));
        $(this).append($('<input>').attr('type','text').attr('id','input'+field_name));
        $(this).append($('<button>').addClass('input_button').attr('id',field_name).html('invia commento').click(function(event){
            event.preventDefault();
            var date = new Date();
            var datetime = date.getYear()+'-'+date.getMonth()+'-'+date.getDay()+' '+date.getHours()+':'+date.getMinutes()+':'+date.getSeconds();
            $.post($('#'+form_comment_id).attr('action'),{
                'SensorarioModuleComment[comment]':$('#input'+field_name).attr('value'),
                'SensorarioModuleComment[semantic_id]':semanticId,
                'SensorarioModuleComment[datetime]':datetime,
                'SensorarioModuleComment[user]':username
            },function(json){
                loadContents(semanticId);
                $('#input'+field_name).attr('value','')
            });
        }));
        $(this).append($('<div>').attr('id','comments'+field_name));
        $(this).wrap($('<form>').attr('id',form_comment_id).attr('action','index.php?r=SensorarioModuleComment/comments/saveNew&semanticId=' + semanticId));
        loadContents(semanticId);
    });
});