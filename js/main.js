!function(){"use strict";document.addEventListener("DOMContentLoaded",function(){if(document.getElementById("mapa")){var e=L.map("mapa").setView([19.436551,-99.140775],17);L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(e),L.marker([19.436551,-99.140775]).addTo(e).bindPopup("GDLWebCamp 2018 <br> Boletos ya disponibles").openPopup()}})}(),$(function(){$(".nombre-sitio").lettering(),$('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass("activo"),$('body.calendario .navegacion-principal a:contains("Calendario")').addClass("activo"),$('body.invitados .navegacion-principal a:contains("Invitados")').addClass("activo");var n=$(window).height(),a=$(".barra").innerHeight();$(window).scroll(function(){var e=$(window).scrollTop();n<e?($(".barra").addClass("fixed"),$("body").css({"margin-top":a+"px"})):($(".barra").removeClass("fixed"),$("body").css({"margin-top":"0px"}))}),$(".menu-movil").on("click",function(){$(".navegacion-principal").slideToggle()}),$(".programa-evento .info-curso:first").show(),$(".menu-programa a:first").addClass("activo"),$(".menu-programa a").on("click",function(){$(".menu-programa a").removeClass("activo"),$(this).addClass("activo"),$(".ocultar").hide();var e=$(this).attr("href");return $(e).fadeIn(1e3),!1}),0<jQuery(".resumen-evento").length&&$(".resumen-evento").waypoint(function(){$(".resumen-evento li:nth-child(1) p").animateNumber({number:6},1200),$(".resumen-evento li:nth-child(2) p").animateNumber({number:15},1200),$(".resumen-evento li:nth-child(3) p").animateNumber({number:3},1500),$(".resumen-evento li:nth-child(4) p").animateNumber({number:9},1500)},{offset:"60%"}),$(".cuenta-regresiva").countdown("2019/02/11 09:00:00",function(e){$("#dias").html(e.strftime("%D")),$("#horas").html(e.strftime("%H")),$("#minutos").html(e.strftime("%M")),$("#segundos").html(e.strftime("%S"))}),$(".invitado-info").colorbox({inline:!0,width:"50%"}),$(".boton_newsletter").colorbox({inline:!0,width:"50%"})});