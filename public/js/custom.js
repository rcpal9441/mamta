const apiUrl = location.protocol + '//' + location.host+'/Api/v1/'; 
const appUrl = location.protocol + '//' + location.host+'/'; 


// $apiUrl = \Config::get('data.apiUrl');
// $appUrl = \Config::get('data.apiUrl');


// const apiUrl = <?php echo $apiUrl; ?>; 
// const appUrl = <?php echo $appUrl; ?>; 

$(function(){
    $( "#search_button" ).click(function( event ) {
        event.preventDefault();
        var product_id ='';
        product_id = $('input[name="product_id"]:checked').val();
        var width = $('input[name="width"]').val();
        var length = $('input[name="length"]').val();
        var depth = $('input[name="depth"]').val();
        var width_par = $('select[name="width_par"]').val();
        var length_par = $('select[name="length_par"]').val();
        var depth_par = $('select[name="depth_par"]').val();
        //console.log(width+' '+length+' '+depth);
        if(width=='' || length==''|| depth==''){
            alert('Please enter width,length,depth');
            return 0;
        }

        var firm_id = ''; 
        var firm_array = [];
        var otheritem_id = '';
        var otheritemsarray = [];
        $.ajax({url: apiUrl+"product.firms.get?pid="+product_id, success: function(result){
            if(result.status){
                var productdensities = result.data.productdensities;
                var otheritems = result.data.otheritems;
                var productdensitieskey = Object.keys(productdensities);
                var productdensitiesvalues = Object.values(productdensities);

                var otheritemskey = Object.keys(otheritems);
                var otheritemsvalues = Object.values(otheritems);
                // for(var i=0; i<productdensitiesvalues.length; i++){
                //     console.log(productdensitiesvalues[i]);
                    // $.each(productdensitiesvalues[i], function(k,l) { 
                         firm_id = $('input[name="firm_name"]:checked').val();   
                        if(firm_id){
                            firm_array.push(firm_id);
                        }
                    // });
                //}
                // console.log('>>>>>>>>>>>>>>>>>>>>>>>>');
                // console.log(firm_array);
                // return 0;
                // for(var i=0; i<productdensitiesvalues.length; i++){
                //     $.each(productdensitiesvalues[i], function(k,l) { 
                //         firm_id = $('input[name="firm_'+l.id+'"]:checked').val();   
                //         if(firm_id){
                //             firm_array.push(l.id);
                //         }
                //     });
                // }
                for(var i=0; i<otheritemsvalues.length; i++){
                    
                     $.each(otheritemsvalues[i], function(k,l) { 
                        otheritem_id = $('input[name="otheritem_'+l.id+'"]:checked').val();
                        if(otheritem_id){
                            otheritemsarray.push(l.id);
                        }
                    });
                }
                var otheritemsarraystr = otheritemsarray.toString();
                var firm_arraystringstr = firm_array.toString();
                window.location.href = appUrl+'shapes/rectangle?pid='+product_id+'&w='+width+'&l='+length+'&d='+depth+'&wp='+width_par+'&lp='+length_par+'&dp='+depth_par+'&oitem_ids='+otheritemsarraystr+'&firm_ids='+firm_arraystringstr;
               
            }
        }
        });
    });
});

function removeItemsbanner(){
    $('#topping_section').remove();
}

function showtoppings(){
    var product_id ='';
    product_id = $('input[name="product_id"]:checked').val();
   
    $.ajax({url: apiUrl+"product.firms.get?pid="+product_id, success: function(result){
        if(result.status){
            var productdensities = result.data.productdensities;
            var otheritems = result.data.otheritems;
            var productdensitieskey = Object.keys(productdensities);
            var productdensitiesvalues = Object.values(productdensities);
            var otheritemskey = Object.keys(otheritems);
            var otheritemsvalues = Object.values(otheritems);
            $('#product_density').empty();
            $('#topping_section').remove();
            var html = '<div class="row" id="topping_section">'+
                            '<div class="col-sm-3">'+
                                '<header class="d-flex  justify-content-between mb-3">'+
                                    '<h4>Foam Type </h4>'+
                                    '<label class="custom-check-heading">'+
                                        '<input type="checkbox" name="options" id="Checkbox11" autocomplete="">'+
                                        '<span class="checkmark-heading"></span>'+
                                    '</label>'+
                                '</header>'+
                                '<div class="checkbox-cover d-flex flex-wrap">';

                                $.each(productdensitieskey, function(i,j) {
                html+=                '<div class="form-group w-50">'+
                                        '<h6>'+j+'</h6>'+
                                        '<ul class="SearchBarItemList">';
                                    $.each(productdensitiesvalues[i], function(k,l) {    

                html+=                      '<li>'+
                                                // '<label title="<div style='width:80px; height:80px;'><img width='100%' height='100%' src='assets/images/latex.jpg' /></div>" class="custom-check" data-toggle="tooltip" data-placement="right" data-html="true" >'+
                                                    '<input type="radio" name="firm_name" value="'+l.id+'" id="firm_'+l.id+'" autocomplete="">'+l.name+
                                                    '<span class="checkmark"></span>'+
                                                // '</label>'+
                                            '</li>';
                                    });

                html+=                  '</ul>'+
                                    '</div>';
                                    });

                
                     html+=       '</div>'+
                            '</div>';

                            $.each(otheritemskey, function(i,j) {

                    html+=  '<div class="col-sm-3">'+
                                '<header class="d-flex  justify-content-between mb-3">'+
                                    '<h4>'+j+'</h4>'+
                                    '<label class="custom-check-heading">'+
                                        '<input type="checkbox" name="options" id="Checkbox11" autocomplete="">'+
                                        '<span class="checkmark-heading"></span>'+
                                    '</label>'+
                                '</header>'+
                                '<div class="checkbox-cover d-flex flex-wrap">'+
                                    '<div class="form-group w-50">'+
                                        '<ul class="SearchBarItemList">';
                                         $.each(otheritemsvalues[i], function(k,l) {
                                            
                    html+=                 '<li>'+
                                                // '<label title="<div style='width:80px; height:80px;'><img width='100%' height='100%' src='assets/images/latex.jpg' /></div>" class="custom-check" data-toggle="tooltip" data-placement="right" data-html="true" >'+
                            '<input type="checkbox" name="otheritem_'+l.id+'" value="'+l.id+'" id="otheritem_'+l.id+'" autocomplete="">'+l.name+
                                                    '<span class="checkmark"></span>'+
                                                // '</label>'+
                                            '</li>';
                                        });

                    html+=              '</ul>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

                        });
                            

                    html+=  '<div class="col-sm-2">'+
                            
                                '<header class="d-flex justify-content-between mb-3">'+
                                    '<h4>Delivery</h4>'+
                                    '<label class="mb-0 custom-check-heading">'+
                                        '<input type="checkbox" name="options" id="Checkbox19" autocomplete="">'+
                                        '<span class="checkmark-heading"></span>'+
                                    '</label>'+
                                '</header>'+
                            
                                '<div class="form-group delivery p-0 row homrde">'+
                                    '<select class="form-control " id="delivery">'+
                                        '<option value="d">Deliver</option>'+
                                        '<option value="p">Pickup </option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="form-group fix-width delivery  p-0">'+
//                                     '<div id="textbox" class="pick-up">'+
// '<input class="pt-0" autocomplete="off" type="text" placeholder=" M3C 0C1 " onfocus="this.placeholder = ''"
//                                             onblur="this.plaautocomplete="off" ceholder = 'M3C 0C1'" id="deliverypin" />'+
//                                         '<a href="#" class="chake-locat"> Check</a>'+
//                                     '</div>'+
                    
                                    '<div id="longtext">'+
                                        '<div class="pick-up"> 11620 178 St NW, Edmonton, AB T5S 2E6 Canada</div>'+
                                    '</div>'+
                                '</div>'+
                    
                            '</div>'+

                        '</div>';
             $('#product_density').append(html);
     }
    

    }});
    
}

function getDensity(){
    var product_id = $('select[name="product_id"]').val(); 

    $.ajax({url: apiUrl+"get.product.density?product_id="+product_id, success: function(result){
        
        if(result.status){
            $('#product_density').empty();
            $.each(result.data, function(key, value) {  
                $('#product_density')
                    .append($("<option></option>")
                                .attr("value",value.id)
                                .text(value.name)); 
            });
        }

  }});
}
getDensity();