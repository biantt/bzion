function notify(a,b){b="undefined"!=typeof b?b:"success";var c=$(".notification");switch(c.show(),c.css("top","-"+c.outerHeight(!0)+"px"),c.attr("class","notification "+b),c.css("left",Math.max(0,($(window).width()-c.outerWidth())/2+$(window).scrollLeft())+"px"),b){case"success":icon="check";break;case"error":icon="exclamation";break;default:icon="question"}$(".notification").find("i").attr("class","fa fa-"+icon),$(".notification").find("span").html(a),c.animate({top:"0"},500),c.delay(2e3).fadeOut(1e3)}$(function(){$(window).resize(function(){$(window).width()>=992&&$(".pages").show()}),$("#mobile-menu").click(function(){$("#menu-pages").slideToggle()})}),function(a){var b=function(b){var c=a("<div/>").text(b.username).html();return b.outdated&&(c='<small style="float:right">(outdated)</small> '+c),c};a.fn.playerlist=function(c){var d=this.find(".player-select"),e=this.find(".player-select-type"),f=a.extend({exceptMe:!1},c);return d.attr("placeholder","Enter player...").css("width","400px").select2({ajax:{url:baseURLNoHost+"/players",dataType:"json",data:function(a){var b={format:"json",startsWith:a};return f.exceptMe&&(b.exceptMe=null),b},results:function(a){return{results:a.players}}},formatSelection:b,formatResult:b}),e.attr("value","0"),void 0!==d.attr("data-value")&&d.select2("data",JSON.parse(d.attr("data-value"))),this}}(jQuery);