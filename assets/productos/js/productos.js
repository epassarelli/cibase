$(document).ready(function () {
	
    // Url Dinamico
    UrlBase = $('#url').val();
 
    // Carga de tabla
    calculaPie();


 });




        function agregarCarro(id,unidadvta) { 

			$.ajax({
				url: UrlBase+'productos/carrito/agregarCarrito',
				data: { producto_id: id,cantidad: unidadvta},
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
            indice_talle=document.getElementById('talle').selectedIndex
            indice_color=document.getElementById('color').selectedIndex
            var talle  = document.getElementById('talle').options[indice_talle].value;
            var color  = document.getElementById('color').options[indice_color].value;
            var nombre_talle  = document.getElementById('talle').options[indice_talle].text;
            var nombre_color  = document.getElementById('color').options[indice_color].text;

			
				
			// Ejecutamos la accion y la enviamos al servidor 
			
			$.ajax({
				url: UrlBase+'productos/carrito/agregarCarrito',
				data: { producto_id: id,
                        cantidad: cantidaddet,
                        talle: talle,
                        color: color,
                        nombre_talle: nombre_talle,
                        nombre_color: nombre_color
                     },
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

        function sumaritem(unidadvta) {
            parcial = parseFloat(document.getElementById('quantity').value);
            if (isNaN(parcial)) {parcial= 0;}
            parcial = parcial + unidadvta;
            document.getElementById('quantity').value = parcial;
            checkStock();
        }

        function restaritem(unidadvta) {
            parcial = parseFloat(document.getElementById('quantity').value);
            if (isNaN(parcial)) {parcial= 0;}
            if (parcial > unidadvta) {
                parcial = parcial - unidadvta;
                document.getElementById('quantity').value = parcial;
            }  
            checkStock();
  
        }


        function agregarCarro2(id,e,unidadvta) { 

            var MyRow = e.closest('tr')[0].rowIndex-1;
            
                     
            // Ejecutamos la accion y la enviamos al servidor 
            $.ajax({
                url: UrlBase+'productos/carrito/agregarCarrito',
                data: { producto_id: id, cantidad: unidadvta},  // 
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        document.getElementsByClassName('cart-qty')[0].textContent=response.items

                        document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].lastElementChild.innerText=response.totallastitem

                        parcial = parseFloat(
                        document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].getElementsByTagName('td')[5].getElementsByTagName('div')[0].getElementsByTagName('input')[1].value);
                        if (isNaN(parcial)) {parcial= 0;}
                        parcial = parcial + unidadvta;
                        document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].getElementsByTagName('td')[5].getElementsByTagName('div')[0].getElementsByTagName('input')[1].value=parcial;




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

        function quitarCarro2(id,e,unidadvta) { 

            var MyRow = e.closest('tr')[0].rowIndex-1;
            
            // Ejecutamos la accion y la enviamos al servidor 
            
            $.ajax({
                url: UrlBase+'productos/carrito/quitarCarrito',
                data: { producto_id: id,cantidad: unidadvta },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        document.getElementsByClassName('cart-qty')[0].textContent=response.items
                        //este if es por si la cantidad es 1 y quiere decrementar el controlador no calcula
                        if (response.totallastitem > unidadvta) {
                            document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].lastElementChild.innerText=response.totallastitem

                            parcial = parseFloat(document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].getElementsByTagName('td')[5].getElementsByTagName('div')[0].getElementsByTagName('input')[1].value);
                            if (isNaN(parcial)) {parcial= 0;}
                            parcial = parcial - unidadvta;
                            document.getElementById('shop_table').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[MyRow].getElementsByTagName('td')[5].getElementsByTagName('div')[0].getElementsByTagName('input')[1].value=parcial;
    
                            calculaPie();
                            Toast.fire({type: 'success',
                                        title: 'Producto Quitado',
                                      })

                        }else{
                            Toast.fire({type: 'error',
                            title: 'Debe eliminar el producto',
                          })

                        }
                        
                       

          
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
                        //document.getElementById('costovacio').innerText=response.envvacio;                        						
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


        function cambiaVacio(id,e,estado) { 

            var MyRow = e.closest('tr')[0].rowIndex-1;
            //console.log(MyRow);
            
            // Ejecutamos la accion y la enviamos al servidor 
            
            $.ajax({
                url: UrlBase+'productos/carrito/cambiaVacio',
                data: { producto_id: id,estado: estado },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        var objeto =  document.getElementsByClassName('vacio')[MyRow];
                        objeto.removeAttribute('class');
                        calculaPie();

                        if (response.estado == 1) {
                            objeto.setAttribute('class','vacio fa  fa-toggle-on fa-2x text-green');
                            Toast.fire({type: 'success',
                                        title: 'Agregado el servicio de Cierre al Vacio',
                                      })


                        }else{
                            objeto.setAttribute('class','vacio fa  fa-toggle-off fa-2x text-green');

                            Toast.fire({type: 'error',
                            title: 'Quitado el servicio de Cierre al Vacio',
                          })

                        }
                        
         
                    }else{
                        alert('Servicio cierre al vacio fallo ');
                        Toast.fire({type: 'error',
                        		title: 'No se pudo modificar el servicio',
                        		   })
                    }
            
                }, //success         
                error: function(response) {
                    alert('error al modificar el servicio');
                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    //alert('Petición realizada');
                }
                        
            });//ajax
            
        } 


        function cambiaEntrega(e) { 

            var MyEntregaID = document.getElementById('entrega_id').options[entrega_id.selectedIndex].value;
        
            // Ejecutamos la accion y la enviamos al servidor 
            
            $.ajax({
                url: UrlBase+'productos/carrito/cambiaEntrega',
                data: { entrega_id: MyEntregaID },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        if (Number(response.costo_entrega) > 0) {
                            document.getElementById('envio').innerText=response.costo_entrega;
                            //objeto.removeAttribute('class');
                        }else{    
                            document.getElementById('envio').innerText="Sin costo de envío";
                        }    
                        calculaPie();
                           // objeto.setAttribute('class','vacio fa  fa-toggle-on fa-2x text-green');
                        if (response.pidedirec == 0)   {
                            document.getElementById('lblcalle').innerHTML='Dirección Calle'
                            document.getElementById('lblnro').innerHTML='Nro'
                            document.getElementById('lblprovincia').innerHTML='Provincia'
                            document.getElementById('lbllocalidad').innerHTML='Localidad'
                        }else{
                            document.getElementById('lblcalle').innerHTML='Dirección Calle *'
                            document.getElementById('lblnro').innerHTML='Nro *'
                            document.getElementById('lblprovincia').innerHTML='Provincia *'
                            document.getElementById('lbllocalidad').innerHTML='Localidad *'

                        }                  
                    }else{
                        Toast.fire({type: 'error',
                        		title: 'No se pudo calcular envio',
                        		   })
                    }
            
                }, //success         
                error: function(response) {
                    alert('error al modificar el servicio');
                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    //alert('Petición realizada');
                }
                        
            });//ajax
            
        } 

        function checkStock() {
            indice_talle=document.getElementById('talle').selectedIndex
            indice_color=document.getElementById('color').selectedIndex
            var talle  = document.getElementById('talle').options[indice_talle].value;
            var color  = document.getElementById('color').options[indice_color].value;
            var cantidad = document.getElementById('quantity').value;
            var producto = document.getElementById('idproducto').value;
           /*  console.log(talle);
            console.log(color); 
            console.log(cantidad);
            console.log(producto); */

            $.ajax({
                url: UrlBase+'productos/verStock',
                data: { color: color,
                        talle: talle,
                        cantidad: cantidad,
                        producto: producto 
                      },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.success == 'OK') {
                        document.getElementById('btnaddcarro').removeAttribute("disabled");
                        // document.getElementById('btnaddcarro').innerHTML='AGREGAR AL CARRITO'
                        document.getElementById("avisarstock").style.display = "none"
                    }else{
                       // document.getElementById('btnaddcarro').innerHTML='SIN STOCK'
                       document.getElementById('btnaddcarro').setAttribute("disabled","false");
                       //solo escribo mensaje si envio dato 
                       
                       if ( Number(color) > 0   && 
                            Number(talle) > 0 && 
                            Number(cantidad) > 0 ) {
                           Toast.fire({type: 'error',
                           title: 'Producto sin stock actualmente',
                          })
                          document.getElementById("avisarstock").style.display = "block"
                        }
                        
                    }
            
                }, //success         
                error: function(response) {
                    alert('error al verificar stock');
                },
                // código a ejecutar sin importar si la petición falló o no
                complete : function(xhr, status) {
                    //alert('Petición realizada');
                }
                        
            });//ajax 
          




        }

        function pendienteStock() {
            indice_talle=document.getElementById('talle').selectedIndex
            indice_color=document.getElementById('color').selectedIndex
            var talle  = document.getElementById('talle').options[indice_talle].value;
            var color  = document.getElementById('color').options[indice_color].value;
            var producto = document.getElementById('idproducto').value;
            var email = document.getElementById('emailaviso').value;
           /*  console.log(talle);
            console.log(color); 
            console.log(producto); 
            console.log(email);  */
            if ( email=='') {
                    Toast.fire({type: 'error', title: 'Ingresa tu E-Mail', })
                    return
             }else{       
                    $.ajax({
                        url: UrlBase+'productos/pendienteStock',
                        data: { color: color,
                                talle: talle,
                                producto: producto,
                                email: email 
                            },
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            if (response.success == 'OK') {
                                Toast.fire({type: 'success', title: 'Te llamamos cuando el producto ingrese',})
                            }else{
                                Toast.fire({type: 'error', title: 'No pudimos registrar tu solicitud',})
                            }
                    
                        }, //success         
                        error: function(response) {
                            alert('error al registrar');
                        },
                        // código a ejecutar sin importar si la petición falló o no
                        complete : function(xhr, status) {
                            //alert('Petición realizada');
                        }
                                
                    });//ajax 
        }

	
    }





