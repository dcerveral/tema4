<script> 
					//LEER JAVASCRIPT
					
					var tagScript = '(?:<script.*?>)((\n|\r|.)*?)(?:<\/script>)';
/**
* Eval script fragment
* @return String
*/
String.prototype.evalScript = function()
{
        return (this.match(new RegExp(tagScript, 'img')) || []).evalScript();
};
/**
* strip script fragment
* @return String
*/
String.prototype.stripScript = function()
{
        return this.replace(new RegExp(tagScript, 'img'), '');
};
/**
* extract script fragment
* @return String
*/
String.prototype.extractScript = function()
{
        var matchAll = new RegExp(tagScript, 'img');
        return (this.match(matchAll) || []);
};
/**
* Eval scripts
* @return String
*/
Array.prototype.evalScript = function(extracted)
{
                var s=this.map(function(sr){
                var sc=(sr.match(new RegExp(tagScript, 'im')) || ['', ''])[1];
                if(window.execScript){
                window.execScript(sc);
                }
                else
                {
                 window.setTimeout(sc,0);
                }
                });
                return true;
};
/**
* Map array elements
* @param {Function} fun
* @return Function
*/
Array.prototype.map = function(fun)
{
        if(typeof fun!=="function"){return false;}
        var i = 0, l = this.length;
        for(i=0;i<l;i++)
        {
                fun(this[i]);
        }
        return true;
};


			// Esta funcion cargara las paginas
			function llamarasincrono (url, id_contenedor)
			{
			
				
				var pagina_requerida = false;
				if (window.XMLHttpRequest)
				{
					// Si es Mozilla, Safari etc
					pagina_requerida = new XMLHttpRequest ();
					
				} else if (window.ActiveXObject)
				{
					// pero si es IE
					try 
					{
						pagina_requerida = new ActiveXObject ("Msxml2.XMLHTTP");
					}
					catch (e)
					{
						// en caso que sea una version antigua
						try
						{
							pagina_requerida = new ActiveXObject ("Microsoft.XMLHTTP");
						}
						catch (e)
						{
						}
					}
				} 
				else
				
				return false;
				pagina_requerida.onreadystatechange = function ()
				{
					// funcion de respuesta
					cargarpagina (pagina_requerida, id_contenedor);
				}
				pagina_requerida.open ('GET', url, true); // asignamos los metodos open y send
				pagina_requerida.send (null);
				
			}
			// todo es correcto y ha llegado el momento de poner la informacion requerida
			// en su sitio en la pagina xhtml
			function cargarpagina (pagina_requerida, id_contenedor)
			{
				if (pagina_requerida.readyState == 4 && (pagina_requerida.status == 200 || window.location.href.indexOf ("http") == - 1))
				
										var scs=pagina_requerida.responseText.extractScript();
				
					document.getElementById (id_contenedor).innerHTML = pagina_requerida.responseText.stripScript();
										scs.evalScript(); 
				
				
				
			}
				
				
				
				function go (url){
				
				web="//lidosport.es/";
				
				ir= web + url;
				
				llamarasincrono(ir, 'central');
					
				}
				</script>