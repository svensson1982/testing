//$(document).ready() or $(function) was missing
$(function(){
    
   	$('#test_form').submit(function() {
		$.ajax({
                    url: 'index.php', 
                    data: $(this).serialize(), 
                    type: 'post', 
                    dataType: 'json', 
                    success: function(data) {
                        //if data has err1 property
                        if( data.hasOwnProperty('err1')){ 
                            $.each($('input[name="val[]"]'), function(k,v){ 
                              //  if(!$.isNumeric($(this).val())){
                                    $(this).addClass('error1');  
                                    $('.error-field1').html(data.err1);
                               // }
                            });
                        }
                        //if data has err2 property
                        else if( data.hasOwnProperty('err2')){ 
                            $.each($('input[name="key[]"]'), function(k,v){
                                var str = $(this).val();
                               // if($.isNumeric(str.substr(0,1)) || !str.match(/[^a-zA-Z0-9]/)){ 
                                    $(this).addClass('error2');  
                                    $('.error-field2').html(data.err2);
                                //}
                            });
                        }
                        //we don't have any errors
                        else{
                            $('.error-field1,.error-field2').empty();
                            $('input[type="text"]').removeClass('error1 error2');
                            $('#test_table > tbody').empty();
                            $.each(data, function(key, val) {
                                    //the chain character isn't "." signal, however "+" signal it works in javaScript
                                    $('<tr><td>'+key+'</td><td>'+val+'</td></tr>').appendTo('#test_table > tbody');
                                   console.log('here we are');
                            }); 
                        }
                    },
                      error:function(err){
                          console.log(err);          
                                }
            });
		return false;
	}); 
        
        iter = 3;
        $('#add-input').on('click', function(){
            iter++;
            $('#test_form > div:last').append('<div>'+
			'<input type="text" name="key[]" value="k'+iter+'" />:'+
                        ' <input type="text" name="val[]" value="'+iter+'" />'+
                            '</div>');
        });
    
});
