$(document).ready(function () {
	
    // Url Dinamico
   // UrlBase = $('#url').val();
 
    // Carga de tabla
    calculaPie();


 });



        function agregarCarro(id) { 

			$.ajax({
				url: UrlBase+'productos/carrito/agregarCarrito',
				data: { producto_id: id,cantidad: 1 },
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success == 'OK') {
						document.getElementsByClassName('cart-qty')[0].textContent=response.items
						
						Toast.fire({type: 'success',
							        title: 'Producto Agregado',
								  })
					}else{
						Toast.fire({type: 'error',
									title: 'No se pudo agregar el producto',
								   })
					}
			
				}, //success         
				error: function(response) {
                    Toast.fire({type: 'error',
                    title: 'Error al agregar',
                   })

                },
				 // código a ejecutar sin importar si la petición falló o no
				 complete : function(xhr, status) {
        			//alert('Petición realizada');
    			}
						
			});//ajax
			
 	    } 

        function agregarCarro3(id) { 
			cantidaddet = document.getElementById('quantity').value;
			
				
			// Ejecutamos la accion y la enviamos al servidor 
			
			$.ajax({
				url: UrlBase+'productos/carrito/agregarCarrito',
				data: { producto_id: id,cantidad: cantidaddet },
				type: 'POST',
				dataType: 'json',
				success: function (response) {
					if (response.success == 'OK') {
						document.getElementsByClassName('cart-qty')[0].textContent=response.items
						Toast.fire({type: 'success',
							        title: 'Producto Agregado',
								  })
					}else{
						Toast.fire({type: 'error',
									title: 'No se pudo agregar el producto',
								   })
					}
			
				}, //success         
				error: function(response) {
                    Toast.fire({type: 'error',
                    title: 'Error al agregar',
                   })
                },
				 // código a ejecutar sin importar si la petición falló o no
				 complete : function(xhr, status) {
        			//alert('Petición realizada');
    			}
						
			});//ajax
        }
		       
        function cambiaCarro2(cantidad,id,e) {
            if (cantidad > 0) {
              

                // Ejecutamos la accion y la enviamos al servidor 
                    $.ajax({
                        url: UrlBase+'productos/carrito/cambiarCarrito',
                        data: { producto_id: id,cantidad: cantidad },
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            if (response.success == 'OK') {
                                document.getElementsByClassName('cart-qty')[0].textContent=response.items;
                                var MyRow = e.closest('tr')[0].rowIndex-1;
                                document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].lastElementChild.innerText=response.parcial;                                
                                calculaPie();

                                Toast.fire({type: 'success',
                                	        title: 'Producto Modificado',
                                		  })
                            }else{
                                Toast.fire({type: 'error',
                                			title: 'No se pudo modificar el producto',
                                		   })
                            }
                    
                        }, //success         
                        error: function(response) {
                            Toast.fire({type: 'success',
                            title: 'Error al cambiar',
                          })                        },
                        // código a ejecutar sin importar si la petición falló o no
                        complete : function(xhr, status) {
                            //alert('Petición realizada');
                        }
                                
                    });//ajax
                }	
        }

        function eliminaItemCarro2(id,e) { 
            
            var MyRow = e.closest('tr')[0].rowIndex-1;
            
            		
            // Ejecutamos la accion y la enviamos al servidor 
            
            $.ajax({
                url: UrlBase+'productos/carrito/eliminarItemCarrito',
                data: { producto_id: id},
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        document.getElementsByClassName('cart-qty')[0].textContent=response.items
                        document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].remove();
                        calculaPie();
                        Toast.fire({type: 'success',
                        	        title: 'Producto Eliminado',
                        		  })
                    }else{
                        Toast.fire({type: 'error',
                        			title: 'No se pudo eliminar el producto',
                        		   })
                    }
            
                }, //success         
                error: function(response) {
                    Toast.fire({type: 'success',
                    title: 'Error',
                  })                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    //alert('Petición realizada');
                }
                        
            });//ajax
            
        } 	

        function agregarCarro2(id,e) { 

            var MyRow = e.closest('tr')[0].rowIndex-1;
            
            
            // Ejecutamos la accion y la enviamos al servidor 
            $.ajax({
                url: UrlBase+'productos/carrito/agregarCarrito',
                data: { producto_id: id,cantidad: 1 },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        document.getElementsByClassName('cart-qty')[0].textContent=response.items

                        document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].lastElementChild.innerText=response.totallastitem

                        calculaPie()
                        Toast.fire({type: 'success',
                        	        title: 'Producto Agregado',
                        		  })
                    }else{
                        Toast.fire({type: 'error',
                        			title: 'No se pudo agregar el producto',
                        		   })
                    }
            
                }, //success         
                error: function(response) {
                    Toast.fire({type: 'error',
                    title: 'No se pudo agregar el producto',
                   })
                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    //alert('Petición realizada');
                }
                        
            });//ajax
            
        } 

        function quitarCarro2(id,e) { 

            alert(xx);
           
            var MyRow = e.closest('tr')[0].rowIndex-1;
            
            // Ejecutamos la accion y la enviamos al servidor 
            
            $.ajax({
                url: UrlBase+'productos/carrito/quitarCarrito',
                data: { producto_id: id,cantidad: 1 },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        document.getElementsByClassName('cart-qty')[0].textContent=response.items
                        //este if es por si la cantidad es 1 y quiere decrementar el controlador no calcula
                        if (response.totallastitem > 0) {
                            document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].lastElementChild.innerText=response.totallastitem
                        }
                        
                        calculaPie();
                        Toast.fire({type: 'success',
                        	        title: 'Producto Quitado',
                        		  })
                    }else{
                        alert('quitado fallo ');
                        Toast.fire({type: 'error',
                        		title: 'No se pudo quitar el producto',
                        		   })
                    }
            
                }, //success         
                error: function(response) {
                    alert('error al quitar');
                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    //alert('Petición realizada');
                }
                        
            });//ajax
            
        } 

        function calculaPie() { 
            // Ejecutamos la accion y la enviamos al servidor 
            $.ajax({
                url: UrlBase+'productos/carrito/pieCarrito',
                data: { opeaacio: 'Calculo' },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                       if (document.getElementById('subtotal') != null) {
                        document.getElementById('subtotal').innerText=response.subtotal;
                        document.getElementById('envio').innerText=response.envio;
                        document.getElementById('total').innerText=response.total;						
                       }     
                    }else{
                        Toast.fire({type: 'error',
                        			title: 'Error de refresco',
                        		   })
                    }
            
                }, //success         
                error: function(response) {
                    alert('error al refrescar pie');
                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    //alert('Petición realizada');
                }
                        
            });//ajax
            
        }





	






