$(window).load(function(){$("body").css("opacity",1)}),$(document).ready(function(){var t,e,i,a;$(".inline").colorbox({inline:!0,width:"950px"}),$("#tabs").tabs(),$("#call-conheca").click(function(){$("#sub-menu").slideToggle()}),$("#call-explore").click(function(){$("#sub-menu-explore").slideToggle()}),$(".applyfilter").click(function(){t=$(this).attr("data-filter"),i=$(".item-category").attr("data-category"),$(".item-category").hide(),$(".item-category").each(function(e){i=$(this).attr("data-category"),t==i&&$(this).fadeIn()})}),$(".checkbox-artistas").click(function(){$(".item-category").hide(),e=$(this).attr("id"),this.checked?$(".item-artista").each(function(t){a=$(this).attr("data-artista"),e==a&&$(this).fadeIn()}):$(".item-artista").each(function(t){a=$(this).attr("data-artista"),e==a&&$(this).fadeOut()})}),$("#next2").click(function(){$(".steps-item").removeClass("ativo"),$("#stepitem2").addClass("ativo"),$("#formstep1").hide(),$("#formstep2").fadeIn()}),$("#next3").click(function(){$(".steps-item").removeClass("ativo"),$("#stepitem3").addClass("ativo"),$("#formstep2").hide(),$("#formstep3").fadeIn()})});