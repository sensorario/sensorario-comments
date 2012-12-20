$(function(){
    function loadContents(semanticId){
        $.ajax({
            url: 'index.php?r=SensorarioModuleComment/comments/number&semanticId=' + semanticId,
            dataType: 'json',
            success: function(json) {
                $('#number_comment_' + semanticId).html('totale commenti: ' + json.totaleCommenti);
                $('#comments_comment_' + semanticId).html('');
                for(commento in json.commenti) {
                    $('#comments_comment_' + semanticId).append(
                        $('<span>').addClass('SensorarioModuleCommentDateTime').html(json.commenti[commento].datetime)
                    ).append(
                        $('<strong>').addClass('SensorarioModuleCommentUser').html(json.commenti[commento].user)
                    ).append(
                        $('<span>').addClass('SensorarioModuleCommentComment').html(json.commenti[commento].comment)
                    ).append('<br>');
                }
            }
        });
    }
    $.each($('div[rel=SensorarioModuleComment]'),function(){
        var form_comment_id = 'form_comment_' + $(this).attr('id');
        var semanticId = $(this).attr('id');
        var field_name = '_comment_' + semanticId;
        $(this).append($('<div>').addClass('totaleCommenti').attr('id','number'+field_name));
        $(this).append($('<input>').attr('type','text').attr('id','input'+field_name));
        $(this).append($('<button>').addClass('input_button').attr('id',field_name).html('invia commento').click(function(event){
            event.preventDefault();
            $.post($('#'+form_comment_id).attr('action'),{
                'comment':$('#input'+field_name).attr('value'),
                'semantic_id':semanticId
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