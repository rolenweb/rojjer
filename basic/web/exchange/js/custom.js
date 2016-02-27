                  $(function() {
                    var catdiv = $( "#catdiv" );
                    
                    $( "#catdiv" ).hide();
                    
                 
                    $( "#orders4-category" ).selectmenu({
                       change: function( event, data ) {
                        
                        if (data.item.value == 0) {
                            catdiv.show();
                        };
                       }
                     });
                    //$( "#type" ).selectmenu();
                    //$( "#langfromselect" ).selectmenu();
                    //$( "#langtoselect" ).selectmenu();  
                    //$( "#experienceselect" ).selectmenu();  
                    //$( "#ratingselect" ).selectmenu();  
                    //$( "#countryselect" ).selectmenu();  
                    
                    
                    
                  });
