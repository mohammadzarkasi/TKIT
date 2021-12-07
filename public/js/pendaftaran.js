function fill_form_pendaftaran(data)
{
    var form = $('#form-pendaftaran');
    console.log('data', data);
    for(const[key,val] of Object.entries(data))
    {
       var input =  form.find('[name=' + key+']');
       var input_type = input.attr('type');
       var tagname = input.prop('tagName');
       console.log('input',key, input_type, tagname, input);
        if(input_type =='text')
        {
            input.val(val);
        }
        else if(input_type=='radio')
        {
            for(var i = 0 ; i < input.length; i++) 
            {
                var inp = $(input[i]);
                if(inp.val() == val)
                {
                    inp.prop('checked', true);
                }
                else {
                    inp.prop('checked', false);
                }
                
            }   
        }
        else if(tagname == 'SELECT' ){
            console.log('updating select...');
            input.val(val);
            
        }
        else if(input_type != undefined)
        {
            input.val(val);
        }
    }
}